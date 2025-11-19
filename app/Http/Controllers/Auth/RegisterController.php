<?php

namespace App\Http\Controllers\Auth;

use Mail, Str;
use App\Models\User;
use App\Rules\Captcha;
use App\Helper\EmailHelper;
use Illuminate\Http\Request;
use App\Mail\UserRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Modules\EmailSetting\App\Models\EmailTemplate;
use GuzzleHttp\Client;
use Exception;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web');
    }


    public function seller_register_page(){

        return view('auth.register');
    }



    public function store_register(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:4', 'max:100'],
            'g-recaptcha-response'=>new Captcha()

        ],[
            'name.required' => trans('Name is required'),
            'email.required' => trans('Email is required'),
            'email.unique' => trans('Email already exist'),
            'password.required' => trans('Password is required'),
            'password.confirmed' => trans('Confirm password does not match'),
            'password.min' => trans('You have to provide minimum 4 character password'),
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => Str::slug($request->name).'-'.date('Ymdhis'),
            'status' => 'enable',
            'is_banned' => 'no',
            'password' => Hash::make($request->password),
            'verification_token' => Str::random(100),
        ]);

        try {
            $client = new Client();
            $verification_link = route('user.register-verification').'?verification_link='.$user->verification_token.'&email='.$user->email;

            $params = [
                'service_id' => env('EMAILJS_SERVICE_ID'),
                'template_id' => env('EMAILJS_WELCOME_TEMPLATE_ID'),
                'user_id' => env('EMAILJS_PUBLIC_KEY'),
                'accessToken' => env('EMAILJS_PRIVATE_KEY'),
                'template_params' => [
                    'user_name' => $request->name,
                    'user_email' => $request->email,
                    'verification_link' => $verification_link,
                ]
            ];

            $response = $client->post('https://api.emailjs.com/api/v1.0/email/send', [
                'json' => $params
            ]);

            if ($response->getStatusCode() == 200) {
                $notify_message = trans('Account created successful, a verification link has been send to your mail, please verify it');
                $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
                return redirect()->back()->with($notify_message);
            } else {
                // Log error or handle failed email sending
                \Log::error('EmailJS API call failed with status: ' . $response->getStatusCode() . ' and body: ' . $response->getBody());
                $notify_message = trans('Account created, but failed to send verification email. Please contact support.');
                $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                return redirect()->back()->with($notify_message);
            }
        } catch (Exception $e) {
            // Log exception
            \Log::error('EmailJS API call failed with exception: ' . $e->getMessage());
            $notify_message = trans('Account created, but failed to send verification email. Please contact support.');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

    }


    public function register_verification(Request $request){
        $user = User::where('verification_token',$request->verification_link)->where('email', $request->email)->first();
        if($user){

            if($user->email_verified_at != null){

                $notify_message = trans('Email already verified');
                $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                return redirect()->route('buyer.login')->with($notify_message);
            }

            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->verification_token = null;
            $user->save();

            $notify_message = trans('Verification Successfully');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->route('user.login')->with($notify_message);
        }else{

            $notify_message = trans('Invalid token or email');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->route('user.login')->with($notify_message);
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
