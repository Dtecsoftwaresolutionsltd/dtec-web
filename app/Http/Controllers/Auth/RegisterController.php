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
        EmailHelper::mail_setup();
        
        $verification_link = route('user.register-verification').'?verification_link='.$user->verification_token.'&email='.$user->email;
        $verification_link = '<a href="'.$verification_link.'">'.$verification_link.'</a>';
        $template=EmailTemplate::where('id',4)->first();
        $subject=$template->subject;
        $message=$template->description;
        $message = str_replace('{{user_name}}',$request->name,$message);
        $message = str_replace('{{varification_link}}',$verification_link,$message);
        Mail::to($user->email)->send(new UserRegistration($message,$subject,$user));


        $notify_message = trans('Account created successful, a verification link has been send to your mail, please verify it');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

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
