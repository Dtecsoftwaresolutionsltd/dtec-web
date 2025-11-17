<?php

namespace Modules\Page\App\Http\Controllers;

use Image, File, Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Page\App\Models\ContactUs;
use Modules\Page\App\Models\ContactUsTranslation;
use Modules\Page\App\Http\Requests\ContactUsRequest;

class ContactPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $contact_us = ContactUs::first();
        $translate = ContactUsTranslation::where('lang_code', $request->lang_code)->first();

        return view('page::contact_us', compact('contact_us','translate'));
    }

    public function update(ContactUsRequest $request)
    {

        if($request->lang_code == admin_lang()){
            $contact_us = ContactUs::first();
            $contact_us->email = $request->email;
            $contact_us->email2 = $request->email2;
            $contact_us->phone = $request->phone;
            $contact_us->phone2 = $request->phone2;
            $contact_us->map_code = $request->map_code;
            $contact_us->save();
        }

        $translate = ContactUsTranslation::where('lang_code', $request->lang_code)->first();
        if(!$translate){
            $contact_us = ContactUs::first();
            $translate = new ContactUsTranslation();
            $translate->contact_us_id = $contact_us->id;
            $translate->lang_code = $request->lang_code;
        }

        $translate->title = $request->title;
        $translate->description = $request->description;
        $translate->address = $request->address;
        $translate->save();

        $notify_message = trans('Updated Successfully');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    public function setup_language($lang_code){
        $contact_translates = ContactUsTranslation::where('lang_code', admin_lang())->get();
        foreach($contact_translates as $contact_translate){
            $translate = new ContactUsTranslation();
            $translate->contact_us_id = $contact_translate->contact_us_id;
            $translate->lang_code = $lang_code;
            $translate->title = $contact_translate->title;
            $translate->description = $contact_translate->description;
            $translate->address = $contact_translate->address;
            $translate->save();
        }
    }

}
