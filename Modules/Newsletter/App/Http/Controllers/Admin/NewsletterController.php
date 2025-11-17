<?php

namespace Modules\Newsletter\App\Http\Controllers\Admin;

use Mail, Str;
use App\Helper\EmailHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Newsletter\App\Models\Newsletter;
use Modules\EmailSetting\App\Models\EmailTemplate;
use Modules\Newsletter\App\Emails\SubscirberSendMail;
use Modules\Newsletter\App\Emails\NewsletterVerification;

class NewsletterController extends Controller
{


    public function index(){

        $newsletters = Newsletter::where('is_verified', 1)->latest()->get();

        return view('newsletter::admin.subscriber_list', compact('newsletters'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function destroy(Request $request, $id)
    {

        $newsletter = Newsletter::find($id);
        $newsletter->delete();

        $notify_message = trans('Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function email_box(){
        return view('newsletter::admin.mail_box');
    }


    public function send_email(Request $request){

        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ],[
            'subject.required' => trans('Subject is required'),
            'message.required' => trans('Message is required'),
        ]);

        $newsletters = Newsletter::where('is_verified',1)->get();
        if($newsletters->count() > 0){
            EmailHelper::mail_setup();
            foreach($newsletters as $index => $newsletter){
                Mail::to($newsletter->email)->send(new SubscirberSendMail($request->subject,$request->message));
            }

            $notify_message = trans('Mail send successfully');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->back()->with($notify_message);
        }else{
            $notify_message = trans('Something Went Wrong');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->back()->with($notify_message);
        }


    }



}
