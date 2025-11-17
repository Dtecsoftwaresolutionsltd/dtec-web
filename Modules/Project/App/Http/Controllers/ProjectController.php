<?php

namespace Modules\Project\App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Modules\Category\Entities\Category;
use Modules\Project\App\Models\Project;
use Modules\Language\App\Models\Language;
use Modules\Category\Entities\SubCategory;
use Modules\Project\App\Models\ProjectGallery;
use Modules\Project\App\Models\ProjectTranslation;
use Modules\GlobalSetting\App\Models\GlobalSetting;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::with('translate')->latest()->get();
        return view('project::index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::with('translate')->where('status', 'enable')->get();
        $theme_setting = GlobalSetting::where('key', 'selected_theme')->first();

        return view('project::create', compact('categories','theme_setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumb_image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'slug' => 'required|unique:projects,slug',
            'website_url' => 'required',
            'project_date' => 'required|date',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'client_name' => 'required|string|max:255',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'video_url'=>'nullable',
            'author_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'author_name' => 'nullable|string|max:255',
            'author_designation' => 'nullable|string|max:255',
            'author_comment' => 'nullable|string',
            'home_two_thumb_image'=>'nullable|image|mimes:jpeg,png,jpg,webp',
            'home_three_thumb_image'=>'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);
        $theme_setting = GlobalSetting::where('key', 'selected_theme')->first();

        $project = new Project();

        if ($request->thumb_image) {
            $image_name = 'project' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.webp';
            $image_name = 'uploads/custom-images/' . $image_name;
            Image::make($request->thumb_image)
                ->encode('webp', 80)
                ->save(public_path() . '/' . $image_name);
            $project->thumb_image = $image_name;
        }


        if ($request->home_two_thumb_image) {
            $image_name = 'project' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.webp';
            $image_name = 'uploads/custom-images/' . $image_name;
            Image::make($request->home_two_thumb_image)
                ->encode('webp', 80)
                ->save(public_path() . '/' . $image_name);
            $project->theme_2_thumb_image = $image_name;
        }


        if ($request->home_three_thumb_image) {
            $image_name = 'project' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.webp';
            $image_name = 'uploads/custom-images/' . $image_name;
            Image::make($request->home_three_thumb_image)
                ->encode('webp', 80)
                ->save(public_path() . '/' . $image_name);
            $project->theme_3_thumb_image = $image_name;
        }


        if ($request->author_image) {
            $image_name = 'project-author' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.webp';
            $image_name = 'uploads/custom-images/' . $image_name;
            Image::make($request->author_image)
                ->encode('webp', 80)
                ->save(public_path() . '/' . $image_name);
            $project->author_image = $image_name;
        }

        $project->category_id = $request->category_id;
        $project->sub_category_id = $request->sub_category_id;
        $project->slug = $request->slug;
        $project->website_url = $request->website_url;
        $project->project_date = $request->project_date;
        $project->project_fb = $request->project_fb;
        $project->project_x = $request->project_x;
        $project->project_linkedin = $request->project_linkedin;
        $project->project_instagram = $request->project_instagram;
        $project->status = 'enable';
        $project->video_url = $request->video_url;
        $project->author_name = $request->author_name;
        $project->author_designation = $request->author_designation;
        $project->save();

        $languages = Language::all();
        foreach ($languages as $language) {
            $project_translate = new ProjectTranslation();
            $project_translate->lang_code = $language->lang_code;
            $project_translate->project_id = $project->id;
            $project_translate->title = $request->title;
            $project_translate->description = $request->description;
            $project_translate->short_description = $request->short_description;
            $project_translate->client_name = $request->client_name;
            $project_translate->seo_title = $request->seo_title ? $request->seo_title : $request->title;
            $project_translate->seo_description = $request->seo_description ? $request->seo_description : $request->title;
            $project_translate->author_comment = $request->author_comment;
            $project_translate->save();
        }

        $notify_message = trans('Created Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.project.index')->with($notify_message);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $theme_setting = GlobalSetting::where('key', 'selected_theme')->first();

        $project_translate = ProjectTranslation::where(['project_id' => $id, 'lang_code' => $request->lang_code])->first();
        $categories = Category::with('translate')->where('status', 'enable')->get();


        return view('project::edit', compact('project', 'project_translate', 'categories','theme_setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $project = Project::findOrFail($id);

        if($request->lang_code == admin_lang()) {

            $request->validate([
                'thumb_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
                'category_id' => 'required|exists:categories,id',
                'sub_category_id' => 'nullable|exists:sub_categories,id',
                'slug' => 'required|unique:projects,slug,'.$id,
                'website_url' => 'required',
                'project_date' => 'required|date',
                'author_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
                'author_name' => 'nullable|string|max:255',
                'author_designation' => 'nullable|string|max:255',
            ]);


            if ($request->thumb_image) {
                $image_name = 'project' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.webp';
                $image_name = 'uploads/custom-images/' . $image_name;
                Image::make($request->thumb_image)
                    ->encode('webp', 80)
                    ->save(public_path() . '/' . $image_name);
                $project->thumb_image = $image_name;
            }

            if ($request->home_two_thumb_image) {
                $image_name = 'project' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.webp';
                $image_name = 'uploads/custom-images/' . $image_name;
                Image::make($request->home_two_thumb_image)
                    ->encode('webp', 80)
                    ->save(public_path() . '/' . $image_name);
                $project->theme_2_thumb_image = $image_name;
            }


            if ($request->home_three_thumb_image) {
                $image_name = 'project' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.webp';
                $image_name = 'uploads/custom-images/' . $image_name;
                Image::make($request->home_three_thumb_image)
                    ->encode('webp', 80)
                    ->save(public_path() . '/' . $image_name);
                $project->theme_3_thumb_image = $image_name;
            }


            if($request->author_image) {
                $old_image = $project->author_image;
                $image_name = 'project-author'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
                $image_name ='uploads/custom-images/'.$image_name;
                Image::make($request->author_image)
                    ->encode('webp', 80)
                    ->save(public_path().'/'.$image_name);
                $project->author_image = $image_name;
                $project->save();

                if($old_image) {
                    if(File::exists(public_path().'/'.$old_image)) unlink(public_path().'/'.$old_image);
                }
            }

            $project->category_id = $request->category_id;
            $project->sub_category_id = $request->sub_category_id;
            $project->slug = $request->slug;
            $project->website_url = $request->website_url;
            $project->project_date = $request->project_date;
            $project->project_fb = $request->project_fb;
            $project->project_x = $request->project_x;
            $project->project_linkedin = $request->project_linkedin;
            $project->project_instagram = $request->project_instagram;
            $project->video_url = $request->video_url;
            $project->author_name = $request->author_name;
            $project->author_designation = $request->author_designation;
            $project->save();
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'client_name' => 'required|string|max:255',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'author_comment' => 'nullable|string',
        ]);

        $project_translate = ProjectTranslation::findOrFail($request->translate_id);
        $project_translate->title = $request->title;
        $project_translate->description = $request->description;
        $project_translate->short_description = $request->short_description;
        $project_translate->client_name = $request->client_name;
        $project_translate->seo_title = $request->seo_title ;
        $project_translate->seo_description = $request->seo_description;
        $project_translate->author_comment = $request->author_comment;
        $project_translate->save();

        $notify_message = trans('Updated Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $listing = Project::findOrFail($id);
        $old_image = $listing->thumb_image;

        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        if($listing->theme_2_thumb_image !='' and file_exists(public_path().'/'.$listing->theme_2_thumb_image)){
            $old_image = $listing->theme_2_thumb_image;

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        if($listing->theme_3_thumb_image !='' and file_exists(public_path().'/'.$listing->theme_3_thumb_image)){
            $old_image = $listing->theme_3_thumb_image;
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        ProjectTranslation::where('project_id',$id)->delete();

        $galleries = ProjectGallery::where('project_id', $id)->get();
        foreach($galleries as $gallery){
            $old_image = $gallery->image;

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }

            $gallery->delete();
        }

        $listing->delete();

        $notify_message=  trans('Delete Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.project.index')->with($notify_message);
    }

    public function setup_language($lang_code){
        $project_translates = ProjectTranslation::where('lang_code', admin_lang())->get();
        foreach($project_translates as $listing_translate){
            $translate = new ProjectTranslation();
            $translate->project_id = $listing_translate->project_id;
            $translate->lang_code = $lang_code;
            $translate->title = $listing_translate->title;
            $translate->client_name = $listing_translate->client_name;
            $translate->description = $listing_translate->description;
            $translate->save();
        }
    }

    public function listing_project($id){
        $project = Project::findOrFail($id);

        $galleries = ProjectGallery::where('project_id', $id)->get();

        return view('project::gallery', compact('project', 'galleries'));
    }

    public function upload_listing_project(Request $request, $id){

        foreach ($request->file as $index => $image) {
            $gallery_image = new ProjectGallery();

            if($image){
                $image_name = 'project-gallery'.date('-Y-m-d-h-i-s-').rand(999,9999).$index.'.webp';
                $image_name ='uploads/custom-images/'.$image_name;
                Image::make($image)
                    ->encode('webp', 80)
                    ->save(public_path().'/'.$image_name);
                $gallery_image->image = $image_name;
            }

            $gallery_image->project_id = $id;
            $gallery_image->save();
        }

        if ($gallery_image) {
            return response()->json([
                'message' => trans('Images uploaded successfully'),
                'url' => route('admin.project-gallery', $id),
            ]);
        } else {
            return response()->json([
                'message' => trans('Images uploaded Failed'),
                'url' => route('admin.project-gallery', $id),
            ]);
        }

    }

    public function delete_listing_project($id){
        $gallery = ProjectGallery::findOrFail($id);
        $old_image = $gallery->image;

        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        $gallery->delete();

        $notify_message=  trans('Delete Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }
}
