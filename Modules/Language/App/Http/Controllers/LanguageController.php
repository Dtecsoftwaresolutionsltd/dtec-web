<?php

namespace Modules\Language\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamTranslation;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Modules\Language\App\Models\Language;
use Modules\City\Entities\CityTranslation;
use Modules\FAQ\App\Models\FaqTranslation;
use Modules\Page\App\Models\PrivacyPolicy;
use Modules\Blog\App\Models\BlogTranslation;
use Modules\Brand\Entities\BrandTranslation;
use Modules\Page\App\Models\TermAndCondition;
use Modules\Page\App\Models\FooterTranslation;
use Modules\Page\App\Models\SliderTranslation;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Page\App\Models\AboutUsTranslation;
use Modules\JobPost\Entities\JobPostTranslation;
use Modules\Listing\Entities\ListingTranslation;
use Modules\Page\App\Models\HomepageTranslation;
use Modules\City\Http\Controllers\CityController;
use Modules\Page\App\Models\ContactUsTranslation;
use Modules\Category\Entities\CategoryTranslation;
use Modules\Ecommerce\Entities\ProductTranslation;
use Modules\Page\App\Models\CustomPageTranslation;
use Modules\Project\App\Models\ProjectTranslation;
use Modules\Brand\Http\Controllers\BrandController;
use Modules\FAQ\App\Http\Controllers\FAQController;
use Modules\Blog\App\Models\BlogCategoryTranslation;
use Modules\Blog\App\Http\Controllers\BlogController;
use Modules\Team\App\Http\Controllers\TeamController;
use Modules\Language\App\Http\Requests\LanguageRequest;
use Modules\Listing\Http\Controllers\ListingController;
use Modules\Page\App\Http\Controllers\SliderController;
use Modules\Page\App\Http\Controllers\PrivacyController;
use Modules\Category\Http\Controllers\CategoryController;
use Modules\Testimonial\App\Models\TestimonialTrasnlation;
use Modules\Page\App\Http\Controllers\CustomPageController;
use Modules\Project\App\Http\Controllers\ProjectController;
use Modules\Page\App\Http\Controllers\ContactPageController;
use Modules\Blog\App\Http\Controllers\BlogCategoryController;
use Modules\Ecommerce\Http\Controllers\Admin\ProductController;
use Modules\Page\App\Http\Controllers\TermsConditiondController;
use Modules\Testimonial\App\Http\Controllers\TestimonialController;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::latest()->get();

        return view('language::index', ['languages' => $languages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('language::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LanguageRequest $request)
    {
        if($request->is_default){
            DB::table('languages')->update(['is_default' => 'No']);
        }

        $language = new Language();
        $language->lang_code = $request->lang_code;
        $language->lang_name = $request->lang_name;
        $language->lang_direction = $request->lang_direction;
        $language->status = $request->status ? 1 : 0;
        $language->is_default = $request->is_default ? 'Yes' : 'No';
        $language->save();


        $testi_lang = new TestimonialController();
        $testi_lang->setup_language($request->lang_code);

        $blog_cat_lang = new BlogCategoryController();
        $blog_cat_lang->setup_language($request->lang_code);

        $blog_lang = new BlogController();
        $blog_lang->setup_language($request->lang_code);

        $faq_lang = new FAQController();
        $faq_lang->setup_language($request->lang_code);

        $privacy_lang = new PrivacyController();
        $privacy_lang->setup_language($request->lang_code);

        $terms_condition_lang = new TermsConditiondController();
        $terms_condition_lang->setup_language($request->lang_code);

        $city_lang = new CityController();
        $city_lang->setup_language($request->lang_code);

        $category_lang = new CategoryController();
        $category_lang->setup_language($request->lang_code);

        $listing_lang = new ListingController();
        $listing_lang->setup_language($request->lang_code);

        $project_lang = new ProjectController();
        $project_lang->setup_language($request->lang_code);

        $page_lang = new CustomPageController();
        $page_lang->setup_language($request->lang_code);

        $slider_lang = new SliderController();
        $slider_lang->setup_language($request->lang_code);

        $team_lang = new TeamController();
        $team_lang->setup_language($request->lang_code);

        $product_lang = new ProductController();
        $product_lang->setup_language($request->lang_code);

        $brand_lang = new BrandController();
        $brand_lang->setup_language($request->lang_code);

        $contact_lang = new ContactPageController();
        $contact_lang->setup_language($request->lang_code);


        /** generate local language */

        $langCode = $request->lang_code;
        $sourcePath = lang_path('en.json');
        $destinationPath = lang_path("{$langCode}.json");


        if (!File::exists($destinationPath)) {
            if (File::exists($sourcePath)) {
                File::copy($sourcePath, $destinationPath);
            } else {
                File::put($destinationPath, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        }

        $notify_message = trans('Created successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');

        return redirect()->route('admin.language.index')->with($notify_message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $language = Language::findOrFail($id);

        return view('language::edit', ['language' => $language]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LanguageRequest $request, $id)
    {

        $language = Language::findOrFail($id);

        if($request->is_default){
            DB::table('languages')->update(['is_default' => 'No']);
        }

        if($language->is_default == 'Yes'){
            DB::table('languages')->where('id', 1)->update(['is_default' => 'Yes']);
        }

        $language->lang_name = $request->lang_name;
        $language->lang_direction = $request->lang_direction;
        $language->status = $request->status ? 1 : 0;
        $language->is_default = $request->is_default ? 'Yes' : 'No';
        $language->save();

        $notify_message = trans('Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.language.index')->with($notify_message);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if($id == 1){
            $notify_message = trans('You can not delete english language');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->route('admin.language.index')->with($notify_message);
        }

        $language = Language::findOrFail($id);
        $langCode = $language->lang_code;
        $language->delete();

        BrandTranslation::where('lang_code', $language->lang_code)->delete();
        BlogCategoryTranslation::where('lang_code' , $language->lang_code)->delete();
        BlogTranslation::where('lang_code' , $language->lang_code)->delete();
        FaqTranslation::where('lang_code' , $language->lang_code)->delete();
        PrivacyPolicy::where('lang_code' , $language->lang_code)->delete();
        TermAndCondition::where('lang_code' , $language->lang_code)->delete();
        TestimonialTrasnlation::where('lang_code' , $language->lang_code)->delete();
        CityTranslation::where('lang_code' , $language->lang_code)->delete();
        CategoryTranslation::where('lang_code' , $language->lang_code)->delete();
        ListingTranslation::where('lang_code' , $language->lang_code)->delete();
        ContactUsTranslation::where('lang_code' , $language->lang_code)->delete();
        FooterTranslation::where('lang_code' , $language->lang_code)->delete();
        CustomPageTranslation::where('lang_code' , $language->lang_code)->delete();
        ProjectTranslation::where('lang_code' , $language->lang_code)->delete();
        SliderTranslation::where('lang_code' , $language->lang_code)->delete();
        TeamTranslation::where('lang_code' , $language->lang_code)->delete();
        ProductTranslation::where('lang_code' , $language->lang_code)->delete();

        $jsonPath = lang_path("{$langCode}.json");

        if (File::exists($jsonPath)) {
            File::delete($jsonPath);
        }

        $notify_message = trans('Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.language.index')->with($notify_message);
    }

    public function theme_language(Request $request)
    {


        Paginator::useBootstrapFive();

        $search = $request->get('search');

        $filePath = lang_path($request->lang_code . '.json');

        if (!File::exists($filePath)) {
            $notify_message = trans('Requested language does not exist');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->route('admin.language.index')->with($notify_message);
        }

        $jsonContent = File::get($filePath);
        $data = json_decode($jsonContent, true);

        // Convert array to collection for easy filtering and slicing
        $collection = collect($data);

        // If search keyword is present, filter the collection by key or value
        if (!empty($search)) {
            $collection = $collection->filter(function ($value, $key) use ($search) {
                return stripos($key, $search) !== false || stripos($value, $search) !== false;
            });
        }

        // Pagination parameters
        $perPage = 20; // items per page
        $page = $request->get('page', 1);

        // Slice the collection to get the items for the current page
        $currentPageItems = $collection->slice(($page - 1) * $perPage, $perPage)->all();

        // Create paginator instance
        $paginatedItems = new LengthAwarePaginator(
            $currentPageItems,
            $collection->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );



        return view('language::theme_language', [
            'data' => $paginatedItems,
        ]);
    }

    public function update_theme_language(Request $request)
    {
        $filePath = lang_path($request->lang_code . '.json');

        if (!File::exists($filePath)) {
            $notify_message = trans('Requested language does not exist');
            return redirect()->route('admin.language.index')->with([
                'message' => $notify_message,
                'alert-type' => 'error',
            ]);
        }

        // Load existing full language data
        $existingData = json_decode(File::get($filePath), true);

        // $request->values contains only keys/values from current page form
        foreach ($request->values as $key => $value) {
            // Update only submitted keys
            if (array_key_exists($key, $existingData)) {
                $existingData[$key] = $value;
            }
        }

        // Save back entire file
        file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $notify_message = trans('Updated successfully');
        return redirect()->back()->with([
            'message' => $notify_message,
            'alert-type' => 'success',
        ]);
    }

}
