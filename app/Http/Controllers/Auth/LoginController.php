<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Rules\Captcha;
use Auth, Hash, Str, Mail;
use App\Helper\EmailHelper;
use Illuminate\Http\Request;
use App\Mail\UserForgetPassword;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\EmailSetting\App\Models\EmailTemplate;
use Modules\GlobalSetting\App\Models\GlobalSetting;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except( 'seller_logout');
    }

    public function custom_login_page()
    {
       return view('auth.login');
    }

    public function store_login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response'=>new Captcha()
        ];

        $custom_error = [
            'email.required' => trans('Email is required'),
            'password.required' => trans('Password is required'),
        ];

        $this->validate($request, $rules, $custom_error);


        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $request->email)->first();

        if($user){
            if($user->status == $user::STATUS_ACTIVE && $user->is_banned == $user::BANNED_INACTIVE){
                if($user->email_verified_at != null){
                    if($user->provider){
                        $notify_message = trans('Please try to login with social media');
                        $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                        return redirect()->back()->with($notify_message);
                    }

                    if($user->feez_status == 1){
                        $notify_message = trans('Your account is in freeze mode. Please contact the admin.');
                        $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                        return redirect()->back()->with($notify_message);
                    }

                    if(Hash::check($request->password, $user->password)){
                        // Get the session ID before login changes it
                        $sessionId = session()->getId();

                        if(Auth::guard('web')->attempt($credentials, $request->remember)){
                        // Convert guest cart to user cart
                        \Modules\Ecommerce\Entities\Cart::where('session_id', $sessionId)
                        ->update(['user_id' => $user->id]);
                        $notify_message = trans('Login successfully');
                        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
                            return redirect()->route('user.dashboard')->with($notify_message);
                        }
                    }else{
                        $notify_message = trans('Credential does not match');
                        $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                        return redirect()->back()->with($notify_message);
                    }
                }else{
                    $notify_message = trans('Please verify your email');
                    $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                    return redirect()->back()->with($notify_message);

                }

            }else{
                $notify_message = trans('Inactive your account');
                $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
                return redirect()->back()->with($notify_message);
            }
        }else{
            $notify_message = trans('Email not found');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }
    }

    public function seller_logout(){
        $user = Auth::guard('web')->user();
        $user->online = 0;
        $user->save();

        Auth::guard('web')->logout();

        $notify_message = trans('Logout successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('user.login')->with($notify_message);

    }

    public function forget_password(){

        return view('auth.forget_password');

    }


    public function send_custom_forget_pass(Request $request){

        $rules = [
            'email' => 'required',
            'g-recaptcha-response'=>new Captcha()
        ];

        $custom_error = [
            'email.required' => trans('Email is required'),
        ];

        $this->validate($request, $rules, $custom_error);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $request->email)->first();

        if($user){

            EmailHelper::mail_setup();

            $user->forget_password_token = Str::random(100);
            $user->save();

            $reset_link = route('user.reset-password').'?token='.$user->forget_password_token.'&email='.$user->email;
            $reset_link = '<a href="'.$reset_link.'">'.$reset_link.'</a>';

            $template = EmailTemplate::where('id',1)->first();
            $subject = $template->subject;
            $message = $template->description;
            $message = str_replace('{{user_name}}',$user->name,$message);
            $message = str_replace('{{reset_link}}',$reset_link,$message);
            Mail::to($user->email)->send(new UserForgetPassword($message,$subject,$user));
            \Log::info('Password Reset Email Details:', [
                'to' => $user->email,
                'subject' => $subject,
                'message' => $message,
                'reset_link' => $reset_link,
                'user_name' => $user->name
            ]);


            $notify_message= trans('A password reset link has been send to your mail');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
            return redirect()->back()->with($notify_message);

        }else{
            $notify_message = trans('Email not found');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

    }

    public function custom_reset_password(Request $request){
        $user = User::select('id','name','email','forget_password_token')->where('forget_password_token', $request->token)->where('email', $request->email)->first();

        if(!$user){
            $notify_message = trans('Invalid token, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('user.reset-password')->with($notify_message);
        }

        return view('auth.reset_password', compact('user'));
    }

    public function store_reset_password(Request $request, $token){

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', 'min:4', 'max:100'],
            'g-recaptcha-response'=>new Captcha()

        ],[
            'email.required' => trans('Email is required'),
            'email.unique' => trans('Email already exist'),
            'password.required' => trans('Password is required'),
            'password.confirmed' => trans('Confirm password does not match'),
            'password.min' => trans('You have to provide minimum 4 character password'),
        ]);


        $user = User::where('forget_password_token', $token)->where('email', $request->email)->first();

        if(!$user){
            $notify_message = trans('Invalid token, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $user->password = Hash::make($request->password);
        $user->forget_password_token = null;
        $user->save();

        $notify_message= trans('Password reset successfully');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('user.login')->with($notify_message);
    }

    public function redirect_to_google(){

        $gmail_client_id = GlobalSetting::where('key', 'gmail_client_id')->first();
        $gmail_secret_id = GlobalSetting::where('key', 'gmail_secret_id')->first();
        $gmail_redirect_url = GlobalSetting::where('key', 'gmail_redirect_url')->first();


        \Config::set('services.google.client_id', $gmail_client_id->value);
        \Config::set('services.google.client_secret', $gmail_secret_id->value);
        \Config::set('services.google.redirect', $gmail_redirect_url->value);

        return Socialite::driver('google')->redirect();

    }

    public function google_callback(){

        $gmail_client_id = GlobalSetting::where('key', 'gmail_client_id')->first();
        $gmail_secret_id = GlobalSetting::where('key', 'gmail_secret_id')->first();
        $gmail_redirect_url = GlobalSetting::where('key', 'gmail_redirect_url')->first();


        \Config::set('services.google.client_id', $gmail_client_id->value);
        \Config::set('services.google.client_secret', $gmail_secret_id->value);
        \Config::set('services.google.redirect', $gmail_redirect_url->value);

        $user = Socialite::driver('google')->user();
        $user = $this->create_user($user,'google');
        // Get session ID before login
        $sessionId = session()->getId();
        auth()->login($user);
        // Convert guest cart to user cart
        \Modules\Ecommerce\Entities\Cart::where('session_id', $sessionId)
        ->update(['user_id' => $user->id]);

        $notify_message= trans('Login Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');

        return redirect()->route('user.dashboard')->with($notify_message);

    }

    public function redirect_to_facebook(){

        $facebook_client_id = GlobalSetting::where('key', 'facebook_client_id')->first();
        $facebook_secret_id = GlobalSetting::where('key', 'facebook_secret_id')->first();
        $facebook_redirect_url = GlobalSetting::where('key', 'facebook_redirect_url')->first();

        \Config::set('services.facebook.client_id', $facebook_client_id->value);
        \Config::set('services.facebook.client_secret', $facebook_secret_id->value);
        \Config::set('services.facebook.redirect', $facebook_redirect_url->value);

        return Socialite::driver('facebook')->redirect();
    }

    public function facebook_callback(){

        $facebook_client_id = GlobalSetting::where('key', 'facebook_client_id')->first();
        $facebook_secret_id = GlobalSetting::where('key', 'facebook_secret_id')->first();
        $facebook_redirect_url = GlobalSetting::where('key', 'facebook_redirect_url')->first();

        \Config::set('services.facebook.client_id', $facebook_client_id->value);
        \Config::set('services.facebook.client_secret', $facebook_secret_id->value);
        \Config::set('services.facebook.redirect', $facebook_redirect_url->value);

        $user = Socialite::driver('facebook')->user();
        $user = $this->create_user($user,'facebook');
        // Get session ID before login
        $sessionId = session()->getId();
        auth()->login($user);
        // Convert guest cart to user cart
        \Modules\Ecommerce\Entities\Cart::where('session_id', $sessionId)
        ->update(['user_id' => $user->id]);

        $notify_message= trans('Login Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');

        return redirect()->route('user.dashboard')->with($notify_message);

    }

    public function create_user($get_info, $provider){
        $user = User::where('email', $get_info->email)->first();
        if (!$user) {

            $user = User::create([
                'name'     => $get_info->name,
                'username'     => Str::slug($get_info->name).'-'.date('Ymdhis'),
                'email'    => $get_info->email,
                'provider' => $provider,
                'provider_id' => $get_info->id,
                'status' => 'enable',
                'is_banned' => 'no',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'verification_token' => null,
            ]);

        }
        return $user;
    }

}
