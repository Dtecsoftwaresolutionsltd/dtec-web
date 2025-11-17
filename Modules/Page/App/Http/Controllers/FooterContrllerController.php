<?php

namespace Modules\Page\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Page\App\Models\Footer;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Page\App\Models\FooterTranslation;

class FooterContrllerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $footer = Footer::first();
        $translate = FooterTranslation::where(['footer_id' => $footer->id, 'lang_code' => $request->lang_code])->first();

        return view('page::section.footer', [
            'footer' => $footer,
            'translate' => $translate,
        ]);
    }

    public function update(Request $request)
    {

        if($request->lang_code == admin_lang()){

            $request->validate([
                'facebook' => 'required|max:250',
                'twitter' => 'required|max:250',
                'linkedin' => 'required|max:250',
                'instagram' => 'required|max:250',
                'copyright' => 'required|max:250',
                'playstore' => 'required|max:250',
                'appstore' => 'required|max:250',
                'address' => 'required|max:250',
                'email' => 'required|max:250',
                'phone' => 'required|max:250',
            ],[
                'facebook' => trans('Facebook is required'),
                'twitter' => trans('Twitter is required'),
                'linkedin' => trans('Linkedin is required'),
                'instagram' => trans('Instagram is required'),
                'copyright' => trans('Copyright is required'),
                'playstore' => trans('Playstore is required'),
                'appstore' => trans('Appstore is required'),
                'address' => trans('Address is required'),
                'email' => trans('Email is required'),
                'phone' => trans('Phone is required'),
            ]);

            $footer = Footer::first();

            $footer->facebook = $request->facebook;
            $footer->twitter = $request->twitter;
            $footer->linkedin = $request->linkedin;
            $footer->instagram = $request->instagram;
            $footer->copyright = $request->copyright;
            $footer->playstore = $request->playstore;
            $footer->appstore = $request->appstore;
            $footer->phone = $request->phone;
            $footer->email = $request->email;
            $footer->address = $request->address;
            $footer->save();

        }

        $request->validate([
            'about_us' => 'required',
        ],[
            'about_us' => trans('About us is required'),
        ]);

        $footer = Footer::first();

        $translate = FooterTranslation::where(['footer_id' => $footer->id, 'lang_code' => $request->lang_code])->first();
        $translate->about_us = $request->about_us;
        $translate->save();


        $notify_message = trans('Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    public function setup_language($lang_code){
        $footer_translates = FooterTranslation::where('lang_code' , admin_lang())->first();

        $new_trans = new FooterTranslation();
        $new_trans->lang_code = $lang_code;
        $new_trans->footer_id = $footer_translates->footer_id;
        $new_trans->about_us = $footer_translates->about_us;
        $new_trans->save();

    }
}
