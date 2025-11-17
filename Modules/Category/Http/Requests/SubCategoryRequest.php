<?php

namespace Modules\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            $rules = [
                'name'=>'required|unique:category_translations',
                'slug'=>'required|unique:categories',
                'category_id'=>'required',
            ];
        }

        if ($this->isMethod('put')) {
            if($this->request->get('lang_code') == admin_lang()){
                $rules = [
                    'name'=>'required',
                    'slug'=> 'required|unique:categories,slug,'.$this->subCategory.',id',
                ];
            }else{
                $rules = [
                    'name'=>'required',
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
            'name.required' => trans('Name is required'),
            'name.unique' => trans('Name already exist'),
            'slug.required' => trans('Slug is required'),
            'category_id.required' => trans('Category is required'),
            'slug.unique' => trans('Slug already exist'),
        ];
    }
}
