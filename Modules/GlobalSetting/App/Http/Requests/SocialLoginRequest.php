<?php

namespace Modules\GlobalSetting\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'facebook_client_id' => 'required',
            'facebook_secret_id' => 'required' ,
            'facebook_redirect_url' => 'required',
            'gmail_client_id' => 'required',
            'gmail_secret_id' => 'required',
            'gmail_redirect_url' => 'required',
        ];
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
            'facebook_client_id.required' => trans('Facebook app id is required'),
            'facebook_secret_id.required' => trans('Facebook app secret is required'),
            'facebook_redirect_url.required' => trans('Facebook redirect url is required'),
            'gmail_client_id.required' => trans('Gmail client id is required'),
            'gmail_secret_id.required' => trans('Gmail secret id is required'),
            'gmail_redirect_url.required' => trans('Gmail redirect url is required'),
        ];
    }


}
