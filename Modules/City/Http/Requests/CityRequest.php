<?php

namespace Modules\City\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'state_id'=>'required|exists:states,id',
                'name'=>'required',
            ];
        }else{

            if($this->request->get('lang_code') == admin_lang()){
                return [
                    'name'=>'required',
                    'state_id'=>'required|exists:states,id',
                ];
            }else{
                return [
                    'name'=>'required',
                ];
            }

        }



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
            'state_id.required' => trans('State is required')
        ];
    }
}

