<?php

namespace Modules\State\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends FormRequest
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
                'country_id'=>'required|exists:countries,id',
                'name'=>'required',
            ];
        }else{

            if($this->request->get('lang_code') == admin_lang()){
                return [
                    'name'=>'required',
                    'country_id'=>'required|exists:countries,id',
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
            'country_id.required' => trans('Country is required')
        ];
    }
}

