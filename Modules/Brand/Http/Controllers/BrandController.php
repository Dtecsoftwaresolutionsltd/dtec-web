<?php

namespace Modules\Brand\Http\Controllers;

use Image, File, Str;
use Illuminate\Http\Request;
use Modules\Brand\Entities\Brand;
use Illuminate\Routing\Controller;
use Modules\Ecommerce\Entities\Product;
use Modules\Language\App\Models\Language;
use Illuminate\Contracts\Support\Renderable;

use Modules\Brand\Entities\BrandTranslation;
use Modules\Brand\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $brands = Brand::with('translate')->latest()->get();

        return view('brand::index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('brand::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(BrandRequest $request)
    {
        $brand = new Brand();
        $brand->slug = $request->slug;
        $brand->status = $request->status ? 'enable' : 'disable';
        $brand->save();

        $languages = Language::all();
        foreach($languages as $language){
            $brand_translation = new BrandTranslation();
            $brand_translation->lang_code = $language->lang_code;
            $brand_translation->brand_id = $brand->id;
            $brand_translation->name = $request->name;
            $brand_translation->save();
        }

        $notification= trans('Created Successfully');
        $notification = array('message'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.brand.index', ['brand' => $brand->id, 'lang_code' => admin_lang()])->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request ,$id)
    {

        $brand = Brand::findOrFail($id);
        $brand_translate = BrandTranslation::where(['brand_id' => $id, 'lang_code' => $request->lang_code])->first();

        return view('brand::edit', ['brand' => $brand, 'brand_translate' => $brand_translate]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);

        if($request->lang_code == admin_lang()){

            $brand->slug = $request->slug;
            $brand->status = $request->status ? 'enable' : 'disable';
            $brand->save();

            $brand_translation = BrandTranslation::findOrFail($request->translate_id);
            $brand_translation->name = $request->name;
            $brand_translation->save();

        }else{

            $brand_translation = BrandTranslation::findOrFail($request->translate_id);
            $brand_translation->name = $request->name;
            $brand_translation->save();
        }

        $notification= trans('Update Successfully');
        $notification=array('message'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $listing_qty = Product::where('brand_id', $id)->count();

        if($listing_qty > 0){
            $notify_message = trans('Multiple product created under it, so you can not delete it');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $brand = Brand::find($id);
        $brand->delete();
        BrandTranslation::where('brand_id', $id)->delete();

        $notification= trans('Delete Successfully');
        $notification=array('message'=>$notification,'alert-type'=>'success');

        return redirect()->route('admin.brand.index')->with($notification);
    }

    public function setup_language($lang_code){
        $brand_translates = BrandTranslation::where('lang_code', admin_lang())->get();
        foreach($brand_translates as $brand_translate){
            $new_brand_translate = new BrandTranslation();
            $new_brand_translate->lang_code = $lang_code;
            $new_brand_translate->brand_id = $brand_translate->brand_id;
            $new_brand_translate->name = $brand_translate->name;
            $new_brand_translate->save();
        }
    }
}
