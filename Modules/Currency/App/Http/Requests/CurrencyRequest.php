<?php

namespace Modules\Currency\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            $rules = [
                'currency_name'=>'required|unique:currencies',
                'country_code'=>'required|unique:currencies',
                'currency_code'=>'required|unique:currencies',
                'currency_icon'=>'required',
                'currency_rate'=>'required|numeric',
                'currency_position'=>'required',
            ];
        }

        if ($this->isMethod('put')) {
            $rules = [
                'currency_name'=>'required|unique:currencies,currency_name,'.$this->multi_currency,
                'country_code'=>'required|unique:currencies,country_code,'.$this->multi_currency,
                'currency_code'=>'required|unique:currencies,currency_code,'.$this->multi_currency,
                'currency_icon'=>'required',
                'currency_rate'=>'required|numeric',
                'currency_position'=>'required',
            ];
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
            'currency_name.required' => trans('Currency name is required'),
            'currency_name.unique' => trans('Currency name already exist'),
            'country_code.required' => trans('Country code is required'),
            'country_code.unique' => trans('Country code already exist'),
            'currency_code.required' => trans('Currency code is required'),
            'currency_code.unique' => trans('Currency code already exist'),
            'currency_icon.required' => trans('Currency icon is required'),
            'currency_icon.unique' => trans('Currency icon already exist'),
            'currency_rate.required' => trans('Currency rate is required'),
            'currency_rate.numeric' => trans('Currency rate must be number'),
            'currency_position.required' => trans('Currency position is required'),
        ];
    }
}
