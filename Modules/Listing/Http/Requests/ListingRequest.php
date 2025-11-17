<?php

namespace Modules\Listing\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\GlobalSetting\App\Models\GlobalSetting;

class ListingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $logoicon_setting = GlobalSetting::where('key', 'selected_theme')->first();
        if ($this->isMethod('post')) {
            $rules = [
                'category_id'=>'required',
                'sub_category_id'=>'nullable',
                'title'=>'required',
                'slug'=>'required|unique:listings',
                'short_description'=>'required|max:555',
                'description'=>'required',
                'inner_page_logo'=>'required|mimes:png,jpg,jpeg,webp,svg',
                'background_image'=>'required|mimes:png,jpg,jpeg,webp',
            ];

            if($logoicon_setting->value == 'all_theme' || $logoicon_setting->value == 'creative_agency' || $logoicon_setting->value == 'digital_marketing'){
                $rules['thumb_image']='required|mimes:png,jpg,jpeg,webp,svg';
            }

            if($logoicon_setting->value == 'seo_agency'){
                $rules['home_two_image'] = 'required|mimes:png,jpg,jpeg,webp,svg';
            }

            if($logoicon_setting->value == 'it_business'){
                $rules['it_business_icon'] = 'required|mimes:png,jpg,jpeg,webp,svg';
            }
            if($logoicon_setting->value == 'saas'){
                $rules['saas_icon'] = 'required|mimes:png,jpg,jpeg,webp,svg';
            }
        }

        if ($this->isMethod('put')) {
            if($this->request->get('lang_code') == admin_lang()){
                $rules = [
                    'title'=>'required',
                    'slug'=>'required|unique:listings,slug,'.$this->listing.',id',
                    'description'=>'required',
                    'short_description'=>'required|max:555',
                    'sub_category_id'=>'nullable',
                    'inner_page_logo'=>'sometimes|required|mimes:png,jpg,jpeg,webp,svg',
                ];
                if($logoicon_setting->value == 'all_theme' || $logoicon_setting->value == 'creative_agency' || $logoicon_setting->value == 'digital_marketing'){
                    $rules['thumb_image']='sometimes|required|mimes:png,jpg,jpeg,webp,svg';
                }

                if($logoicon_setting->value == 'it_business'){
                    $rules['it_business_icon'] = 'sometimes|required|mimes:png,jpg,jpeg,webp,svg';
                }

                if($logoicon_setting->value == 'seo_agency'){
                    $rules['home_two_image'] = 'sometimes|required|mimes:png,jpg,jpeg,webp,svg';
                }

                if($logoicon_setting->value == 'saas'){
                    $rules['saas_icon'] = 'sometimes|required|mimes:png,jpg,jpeg,webp,svg';
                }

            }else{
                $rules = [
                    'title'=>'required',
                    'description'=>'required',
                ];
            }
        }

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'category_id.required' => trans('Category is required'),
            'sub_category_id.required' => trans('Sub Category is required'),
            'title.required' => trans('Title is required'),
            'slug.required' => trans('Slug is required'),
            'slug.unique' => trans('Slug already exist'),
            'description.required' => trans('Description is required'),
            'thumb_image.required' => trans('Icon is required'),
            'inner_page_logo.required' => trans('Inner page logo is required'),
            'background_image.required' => trans('Thumbnail image is required'),
            'thumb_image.mimes' => trans('Image type is not valid'),
            'it_business_icon.mimes' => trans('Image type is not valid'),
            'it_business_icon.required' => trans('Icon is required'),
            'saas_icon.required' => trans('Icon is required'),
            'home_two_image.required' => trans('Icon is required'),
            'home_two_image.mimes' => trans('Image type is not valid'),
            'saas_icon.mimes' => trans('Image type is not valid'),

        ];
    }
}
