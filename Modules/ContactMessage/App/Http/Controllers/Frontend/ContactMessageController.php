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

        $notify_message= trans('Your message has send successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }


}
