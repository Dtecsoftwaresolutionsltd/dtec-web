<?php

namespace Modules\ContactMessage\App\Http\Controllers\Frontend;

use App\Helper\EmailHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\EmailSetting\App\Models\EmailTemplate;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use Modules\ContactMessage\App\Models\ContactMessage;
use Modules\ContactMessage\App\Emails\SendContactMessage;
use Modules\ContactMessage\App\Http\Requests\ContactMessageRequest;
use Mail;

class ContactMessageController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store_contact_message(ContactMessageRequest $request)
    {

        $contact_message = new ContactMessage();
        $contact_message->name = $request->name;
        $contact_message->email = $request->email;
        $contact_message->phone = $request->phone;
        $contact_message->message = $request->message;
        $contact_message->save();

        EmailHelper::mail_setup();

        $setting = GlobalSetting::where('key', 'contact_message_mail')->first();

        $template = EmailTemplate::find(2);
        $message = $template->description;
        $subject = $template->subject;
        $message = str_replace('{{user_name}}',$request->name,$message);
        $message = str_replace('{{user_email}}',$request->email,$message);
        $message = str_replace('{{user_phone}}',$request->phone,$message);
        $message = str_replace('{{message}}',$request->message,$message);

        Mail::to($setting->value)->send(new SendContactMessage($message,$subject, $request->email, $request->name));

        $notify_message= trans('Your message has send successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }


}
