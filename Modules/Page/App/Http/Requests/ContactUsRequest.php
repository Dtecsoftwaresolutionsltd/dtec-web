<?php

namespace Modules\Page\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        if($this->request->get('lang_code') == admin_lang()){
            $rules = [
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'map_code' => 'required',
                'title' => 'required',
                'description' => 'required',
            ];
        }else{
            $rules = [
                'address' => 'required',
                'title' => 'required',
                'description' => 'required',
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'email.required' => trans('Email is required'),
            'phone.required' => trans('Phone is required'),
            'address.required' => trans('Address is required'),
            'map_code.required' => trans('Google Map is required'),
            'title.required' => trans('Title is required'),
            'description.required' => trans('Description is required'),
            'contact_description.required' => trans('Contact description is required'),
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
