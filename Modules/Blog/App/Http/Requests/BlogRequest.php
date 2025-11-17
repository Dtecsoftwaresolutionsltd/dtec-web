<?php

namespace Modules\Blog\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function rules()
    {
        if ($this->isMethod('post')) {
            $rules = [
                'title'=>'required|unique:blog_translations',
                'slug'=>'required|unique:blogs',
                'image'=>'required',
                'description'=>'required',
                'category'=>'required',
            ];
        }

        if ($this->isMethod('put')) {
            if($this->request->get('lang_code') == admin_lang()){
                $rules = [
                    'title'=>'required',
                    'slug'=>'required|unique:blogs,slug,'.$this->blog.',id',
                    'description'=>'required',
                    'category'=>'required',
                ];
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
            'title.required' => trans('Title is required'),
            'title.unique' => trans('Title already exist'),
            'slug.required' => trans('Slug is required'),
            'slug.unique' => trans('Slug already exist'),
            'image.required' => trans('Image is required'),
            'description.required' => trans('Description is required'),
            'category.required' => trans('Category is required'),
        ];
    }
}
