<?php

namespace Modules\Newsletter\App\Http\Controllers;

use Mail, Str;
use App\Helper\EmailHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Newsletter\App\Models\Newsletter;
use Modules\EmailSetting\App\Models\EmailTemplate;
use Modules\Newsletter\App\Emails\NewsletterVerification;

class NewsletterController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|unique:newsletters',
        ];

        $custom_error = [
            'email.required' => trans('Email is required'),
            'email.unique' => trans('Email already exist'),
        ];

        $this->validate($request, $rules, $custom_error);

        EmailHelper::mail_setup();

        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->verified_token = Str::random(25);
        $newsletter->save();

        $verification_link = route('newsletter-verification').'?verification_link='.$newsletter->verified_token.'&email='.$newsletter->email;
        $verification_link = '<a href="'.$verification_link.'">'.$verification_link.'</a>';

        $template = EmailTemplate::find(3);
        $message = $template->description;
        $subject = $template->subject;
        $message = str_replace('{{verification_link}}',$verification_link,$message);


        Mail::to($newsletter->email)->send(new NewsletterVerification($message,$subject));

        $notify_message = trans('A verification link send to your email');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function newsletter_verification(Request $request){
        $newsletter = Newsletter::where(['email' => $request->email, 'verified_token' => $request->verification_link])->first();

        if($newsletter){
            $newsletter->verified_token = null;
            $newsletter->status = 1;
            $newsletter->is_verified = 1;
            $newsletter->save();

            $notify_message = trans('Newsletter verification successful');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->route('home')->with($notify_message);

        }else{
            $notify_message = trans('Something went wrong');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->route('home')->with($notify_message);
        }
    }

}
