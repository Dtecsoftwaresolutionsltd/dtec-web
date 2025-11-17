<?php

namespace Modules\Partner\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Modules\Partner\App\Models\Partner;
use Modules\GlobalSetting\App\Models\GlobalSetting;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();

        return view('partner::index',compact('partners'));
    }

    public function create()
    {
        $theme_setting = GlobalSetting::where('key', 'selected_theme')->first();

        return view('partner::create',compact('theme_setting'));
    }


    public function store(Request $request)
    {
        $theme_setting = GlobalSetting::where('key', 'selected_theme')->first();

        $rules = [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];


        if($theme_setting->selected_theme == 'creative_agency'){
            $rules['home_three_icon'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        if($theme_setting->selected_theme == 'ai_software'){
            $rules['home_four_icon'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        if($theme_setting->selected_theme == 'it_business'){
            $rules['home_six_icon'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        $customMessages = [
            'logo.required' => trans('Logo is required')
        ];

        if($theme_setting->selected_theme == 'creative_agency'){
            $customMessages['home_three_icon.required'] = trans('Icon is required');
        }

        if($theme_setting->selected_theme == 'ai_software'){
            $customMessages['home_four_icon.required'] = trans('Icon is required');
        }

        if($theme_setting->selected_theme == 'it_business'){
            $customMessages['home_six_icon.required'] = trans('Icon is required');
        }

        $request->validate($rules,$customMessages);

        $partner = new Partner();
        if($request->logo){
            $extention = $request->logo->getClientOriginalExtension();
            $logo_name = 'our-partner'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $logo_name = 'uploads/custom-images/'.$logo_name;
            $request->logo->move(public_path('uploads/custom-images/'),$logo_name);
            $partner->logo=$logo_name;
        }

        if($request->home_three_icon){
            $extention = $request->home_three_icon->getClientOriginalExtension();
            $logo_name = 'our-partner'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $logo_name = 'uploads/custom-images/'.$logo_name;
            $request->home_three_icon->move(public_path('uploads/custom-images/'),$logo_name);
            $partner->home_three_icon=$logo_name;
        }
        if($request->home_four_icon){
            $extention = $request->home_four_icon->getClientOriginalExtension();
            $logo_name = 'our-partner'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $logo_name = 'uploads/custom-images/'.$logo_name;
            $request->home_four_icon->move(public_path('uploads/custom-images/'),$logo_name);
            $partner->home_four_icon=$logo_name;
        }
        if($request->home_six_icon){
            $extention = $request->home_six_icon->getClientOriginalExtension();
            $logo_name = 'our-partner'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $logo_name = 'uploads/custom-images/'.$logo_name;
            $request->home_six_icon->move(public_path('uploads/custom-images/'),$logo_name);
            $partner->home_six_icon=$logo_name;
        }

        $partner->link = $request->link;
        $partner->save();

        $notification = trans('Created Successfully');
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.partner.index')->with($notification);
    }


    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        $theme_setting = GlobalSetting::where('key', 'selected_theme')->first();

        return view('partner::edit',compact('partner','theme_setting'));
    }


    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);


        if($request->logo){
            $old_logo = $partner->logo;
            $extention = $request->logo->getClientOriginalExtension();
            $logo_name = 'Partner'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $logo_name = 'uploads/custom-images/'.$logo_name;

            $request->logo->move(public_path('uploads/custom-images/'),$logo_name);

            $partner->logo = $logo_name;
            $partner->save();
            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }
        }

        if($request->home_three_icon){
            $old_home_three_icon = $partner->home_three_icon;
            $extention = $request->home_three_icon->getClientOriginalExtension();
            $logo_name = 'Partner'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $logo_name = 'uploads/custom-images/'.$logo_name;
            $request->home_three_icon->move(public_path('uploads/custom-images/'),$logo_name);
            $partner->home_three_icon = $logo_name;
            $partner->save();
            if($old_home_three_icon){
                if(File::exists(public_path().'/'.$old_home_three_icon))unlink(public_path().'/'.$old_home_three_icon);
            }
        }
        if($request->home_four_icon){
            $old_home_four_icon = $partner->home_four_icon;
            $extention = $request->home_four_icon->getClientOriginalExtension();
            $logo_name = 'Partner'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $logo_name = 'uploads/custom-images/'.$logo_name;
            $request->home_four_icon->move(public_path('uploads/custom-images/'),$logo_name);
            $partner->home_four_icon = $logo_name;
            $partner->save();
            if($old_home_four_icon){
                if(File::exists(public_path().'/'.$old_home_four_icon))unlink(public_path().'/'.$old_home_four_icon);
            }
        }
        if($request->home_six_icon){
            $old_home_six_icon = $partner->home_six_icon;
            $extention = $request->home_six_icon->getClientOriginalExtension();
            $logo_name = 'Partner'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $logo_name = 'uploads/custom-images/'.$logo_name;
            $request->home_six_icon->move(public_path('uploads/custom-images/'),$logo_name);
            $partner->home_six_icon = $logo_name;
            $partner->save();
            if($old_home_six_icon){
                if(File::exists(public_path().'/'.$old_home_six_icon))unlink(public_path().'/'.$old_home_six_icon);
            }
        }

        $partner->link = $request->link;
        $partner->save();

        $notification = trans('Update Successfully');
        $notification = array('message'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.partner.index')->with($notification);
    }


    public function destroy($id)
    {
        $partner = Partner::find($id);
        $old_logo = $partner->logo;
        $old_home_three_icon = $partner->home_three_icon;
        $old_home_four_icon = $partner->home_four_icon;
        $old_home_six_icon = $partner->home_six_icon;
        $partner->delete();
        if($old_logo){
            if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
        }
        if($old_home_three_icon){
            if(File::exists(public_path().'/'.$old_home_three_icon))unlink(public_path().'/'.$old_home_three_icon);
        }
        if($old_home_four_icon){
            if(File::exists(public_path().'/'.$old_home_four_icon))unlink(public_path().'/'.$old_home_four_icon);
        }
        if($old_home_six_icon){
            if(File::exists(public_path().'/'.$old_home_six_icon))unlink(public_path().'/'.$old_home_six_icon);
        }

        $notification = trans('Delete Successfully');
        $notification = array('message'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.partner.index')->with($notification);
    }

}
