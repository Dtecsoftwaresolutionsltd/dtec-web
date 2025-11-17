<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth, Hash;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('admin_logout');
    }

    public function custom_login_page(){

        $has_super_admin = Admin::exists();

        return view('admin.auth.login', [
            'has_super_admin' => $has_super_admin
        ]);
    }

    public function store_login(Request $request){

        $rules = [
            'email' => 'required',
            'password' => 'required',
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

        $admin = Admin::where('email', $request->email)->first();
        if($admin){
            if($admin->status == $admin::STATUS_ACTIVE){
                if(Hash::check($request->password, $admin->password)){
                    if(Auth::guard('admin')->attempt($credentials, $request->remember)){

                        $notify_message = trans('Login successfully');
                        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
                        return redirect()->route('admin.dashboard')->with($notify_message);

                    }
                }else{
                    $notify_message = trans('Credential does not match');
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


    public function store_register(Request $request){

        $has_super_admin = Admin::exists();

        if($has_super_admin){
            $notify_message = trans('Super admin already exist');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', 'confirmed', 'min:4', 'max:100']

        ],[
            'name.required' => trans('Name is required'),
            'email.required' => trans('Email is required'),
            'email.unique' => trans('Email already exist'),
            'password.required' => trans('Password is required'),
            'password.confirmed' => trans('Confirm password does not match'),
            'password.min' => trans('You have to provide minimum 4 character password'),
        ]);

        $super_admin = new Admin();
        $super_admin->name = $request->name;
        $super_admin->email = $request->email;
        $super_admin->status = 'enable';
        $super_admin->admin_type = 'super_admin';
        $super_admin->password = Hash::make($request->password);
        $super_admin->save();

        Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);

        $notify_message = trans('Super admin created successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.dashboard')->with($notify_message);
    }



    public function admin_logout(){
        Auth::guard('admin')->logout();

        $notify_message = trans('Logout successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.login')->with($notify_message);

    }
}
