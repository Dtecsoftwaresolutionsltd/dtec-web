<?php

namespace Modules\PaymentGateway\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RazorpayRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'razorpay_key' => 'required',
            'razorpay_secret' => 'required',
            'currency_id' => 'required',
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => trans('Name is required'),
            'razorpay_key.required' => trans('Razorpay key is required'),
            'razorpay_secret.required' => trans('Secret key is required'),
            'currency_id.required' => trans('Currency is required'),
            'description.required' => trans('Description is required'),
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
