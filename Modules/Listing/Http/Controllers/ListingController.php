<?php

namespace Modules\Listing\Http\Controllers;

use Image, File;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Listing\Entities\Listing;
use Modules\Category\Entities\Category;
use Modules\Language\App\Models\Language;
use Modules\Ecommerce\Entities\ProductReview;
use Modules\Listing\Entities\ListingTranslation;
use Modules\Listing\Http\Requests\ListingRequest;
use Modules\GlobalSetting\App\Models\GlobalSetting;

class ListingController extends Controller
{

    public function index()
    {
        $listings = Listing::with('translate','category')->latest()->get();

        return view('listing::index', compact('listings'));
    }


    public function create(Request $request)
    {
        $categories = Category::with('translate')->where('status', 'enable')->get();
        $logoicon_setting = GlobalSetting::where('key', 'selected_theme')->first();

        return view('listing::create', compact('categories', 'logoicon_setting'));
    }

    public function store(ListingRequest $request)
    {
        $listing = new Listing();
        $theme_setting = GlobalSetting::where('key', 'selected_theme')->first();

        if($request->home_two_image){
            $image_name = 'category-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$request->home_two_image->getClientOriginalExtension();
            $image_name ='uploads/custom-images/'.$image_name;
            $request->home_two_image->move(public_path('uploads/custom-images'), $image_name);

            $listing->theme_2_thumbnail_image = $image_name;

        }

        if($request->thumb_image){

            $image_name = 'category-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$request->thumb_image->getClientOriginalExtension();
            $image_name ='uploads/custom-images/'.$image_name;
            $request->thumb_image->move(public_path('uploads/custom-images'), $image_name);

            $listing->thumb_image = $image_name ?? null;

        }

        if($request->inner_page_logo){
            $image_name = 'category-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$request->inner_page_logo->getClientOriginalExtension();
            $image_name ='uploads/custom-images/'.$image_name;
            $request->inner_page_logo->move(public_path('uploads/custom-images'), $image_name);

            $listing->theme_5_thumbnail_image = $image_name;
        }
        if($request->it_business_icon){
            $image_name = 'category-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$request->it_business_icon->getClientOriginalExtension();
            $image_name ='uploads/custom-images/'.$image_name;
            $request->it_business_icon->move(public_path('uploads/custom-images'), $image_name);

            $listing->it_business_icon = $image_name;
        }

        if($request->saas_icon){
            $image_name = 'category-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$request->saas_icon->getClientOriginalExtension();
            $image_name ='uploads/custom-images/'.$image_name;
            $request->saas_icon->move(public_path('uploads/custom-images'), $image_name);

            $listing->saas_icon = $image_name;
        }

        if($request->background_image){
            $image_name = 'listing'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->background_image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $listing->background_image = $image_name;
        }

        $listing->category_id = $request->category_id;
        $listing->slug = $request->slug;
        $listing->status = 'enable';
        $listing->seo_title = $request->seo_title ? $request->seo_title : $request->title;
        $listing->seo_description = $request->seo_description ? $request->seo_description : $request->title;
        $listing->save();


        $languages = Language::all();
        foreach($languages as $language){
            $listing_translate = new ListingTranslation();
            $listing_translate->lang_code = $language->lang_code;
            $listing_translate->listing_id = $listing->id;
            $listing_translate->title = $request->title;
            $listing_translate->description = $request->description;
            $listing_translate->short_description = $request->short_description;
            $listing_translate->save();
        }


        $notify_message= trans('Created Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.listings.edit', ['listing' => $listing->id, 'lang_code' => admin_lang()] )->with($notify_message);
    }


    public function edit(Request $request, $id)
    {

        $listing = Listing::findOrFail($id);

        $listing_translate = ListingTranslation::where(['listing_id' => $id, 'lang_code' => $request->lang_code])->first();

        $categories = Category::with('translate')->where('status', 'enable')->get();

        $logoicon_setting = GlobalSetting::where('key', 'selected_theme')->first();


        return view('listing::edit', compact('categories', 'listing', 'listing_translate','logoicon_setting'));
    }

    public function update(ListingRequest $request, $id)
    {

        $listing = Listing::findOrFail($id);
        $theme_setting = GlobalSetting::where('key', 'selected_theme')->first();

        if($request->lang_code == admin_lang()) {

            if($request->home_two_image){
                $old_image = $listing->theme_2_thumbnail_image;
                $image_name = 'category-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$request->home_two_image->getClientOriginalExtension();
                $image_name ='uploads/custom-images/'.$image_name;
                $request->home_two_image->move(public_path('uploads/custom-images'), $image_name);

                $listing->theme_2_thumbnail_image = $image_name;

                $listing->save();

                if($old_image) {
                    if(File::exists(public_path().'/'.$old_image)) unlink(public_path().'/'.$old_image);
                }
            }
            if($request->it_business_icon){
                $old_image = $listing->it_business_icon;
                $image_name = 'category-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$request->it_business_icon->getClientOriginalExtension();
                $image_name ='uploads/custom-images/'.$image_name;
                $request->it_business_icon->move(public_path('uploads/custom-images'), $image_name);

                $listing->it_business_icon = $image_name;

                $listing->save();

                if($old_image) {
                    if(File::exists(public_path().'/'.$old_image)) unlink(public_path().'/'.$old_image);
                }
            }
            if($request->saas_icon){
                $old_image = $listing->saas_icon;
                $image_name = 'category-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$request->saas_icon->getClientOriginalExtension();
                $image_name ='uploads/custom-images/'.$image_name;
                $request->saas_icon->move(public_path('uploads/custom-images'), $image_name);

                $listing->saas_icon = $image_name;

                $listing->save();

                if($old_image) {
                    if(File::exists(public_path().'/'.$old_image)) unlink(public_path().'/'.$old_image);
                }
            }

            if($request->thumb_image){

                $image_name = 'category-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$request->thumb_image->getClientOriginalExtension();
                $image_name ='uploads/custom-images/'.$image_name;
                $request->thumb_image->move(public_path('uploads/custom-images'), $image_name);

                $listing->thumb_image = $image_name;

            }

            if($request->inner_page_logo){
                $old_image = $listing->inner_page_logo;
                $image_name = 'category-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$request->inner_page_logo->getClientOriginalExtension();
                $image_name ='uploads/custom-images/'.$image_name;
                $request->inner_page_logo->move(public_path('uploads/custom-images'), $image_name);

                $listing->theme_5_thumbnail_image = $image_name;

                $listing->save();

                if($old_image) {
                    if(File::exists(public_path().'/'.$old_image)) unlink(public_path().'/'.$old_image);
                }
            }

            if($theme_setting->value == 'all_theme'){

                if($request->thumb_image){
                    $old_image = $listing->thumb_image;
                    $image_name = 'category-'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$request->thumb_image->getClientOriginalExtension();
                    $image_name ='uploads/custom-images/'.$image_name;
                    $request->thumb_image->move(public_path('uploads/custom-images'), $image_name);

                    $listing->thumb_image = $image_name;

                    $listing->save();

                    if($old_image) {
                        if(File::exists(public_path().'/'.$old_image)) unlink(public_path().'/'.$old_image);
                    }

                }
            }



            if($request->background_image){
                $old_image = $listing->background_image;
                $image_name = 'listing'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
                $image_name ='uploads/custom-images/'.$image_name;
                Image::make($request->background_image)
                    ->encode('webp', 80)
                    ->save(public_path().'/'.$image_name);
                $listing->background_image = $image_name;
                $listing->save();

                if($old_image) {
                    if(File::exists(public_path().'/'.$old_image)) unlink(public_path().'/'.$old_image);
                }
            }



            $listing->category_id = $request->category_id;
            $listing->sub_category_id = $request->sub_category_id;
            $listing->slug = $request->slug;
            $listing->seo_title = $request->seo_title ? $request->seo_title : $request->title;
            $listing->seo_description = $request->seo_description ? $request->seo_description : $request->title;
            $listing->save();

        }

        $listing_translate = ListingTranslation::findOrFail($request->translate_id);
        $listing_translate->title = $request->title;
        $listing_translate->description = $request->description;
        $listing_translate->short_description = $request->short_description;
        $listing_translate->save();

        $notify_message = trans('Updated Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    public function destroy($id)
    {

        $listing = Listing::findOrFail($id);
        $old_image = $listing->thumb_image;
        $theme_setting = GlobalSetting::where('key', 'selected_theme')->first();



        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        if($listing->theme_2_thumbnail_image !='' and file_exists(public_path().'/'.$listing->theme_2_thumbnail_image)){
            $old_image = $listing->theme_2_thumbnail_image;

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        ListingTranslation::where('listing_id',$id)->delete();

        $listing->delete();

        $notify_message=  trans('Delete Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.listings.index')->with($notify_message);
    }

    public function setup_language($lang_code){
        $listing_translates = ListingTranslation::where('lang_code', admin_lang())->get();
        foreach($listing_translates as $listing_translate){
            $translate = new ListingTranslation();
            $translate->listing_id = $listing_translate->listing_id;
            $translate->lang_code = $lang_code;
            $translate->title = $listing_translate->title;
            $translate->description = $listing_translate->description;
            $translate->short_description = $listing_translate->short_description;
            $translate->save();
        }
    }



    public function review_detail($id){

        $review = ProductReview::with('user')->findOrFail($id);

        return view('listing::review_show', ['review' => $review]);
    }


    public function review_delete($id){

        $review = ProductReview::findOrFail($id);
        $review->delete();

        $notify_message=  trans('Deleted Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.product.review.list')->with($notify_message);
    }

}
