<?php

namespace Modules\Subscription\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionPlanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'plan_name' => 'required',
            'plan_price' => 'required|numeric',
            'expiration_date' => 'required',
            'serial' => 'required|numeric',
            'short_description' => 'required|string',
            'features' => 'required|string',
        ];

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
            'plan_name.required' => trans('Plan name is required'),
            'plan_price.required' => trans('Plan price is required'),
            'plan_price.numeric' => trans('Plan price should be numeric'),
            'expiration_date.required' => trans('Expiration date is required'),
            'serial.required' => trans('Serial is required'),
            'features.required' => trans('Featured listing is required'),
            'short_description.required' => trans('Short Description is required')

        ];
    }
}
