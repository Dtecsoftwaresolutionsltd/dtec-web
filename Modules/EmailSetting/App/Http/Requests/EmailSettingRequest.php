<?php

namespace Modules\EmailSetting\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'sender_name' => 'required',
            'mail_host' => 'required',
            'email' => 'required',
            'smtp_username' => 'required',
            'smtp_password' => 'required',
            'mail_port' => 'required',
            'mail_encryption' => 'required',
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
            'sender_name.required' => trans('Sender name is required'),
            'mail_host.required' => trans('Mail host is required'),
            'email.required' => trans('Email is required'),
            'smtp_username.required' => trans('Smtp username is required'),
            'smtp_password.unique' => trans('Smtp password is required'),
            'mail_port.required' => trans('Mail port is required'),
            'mail_encryption.required' => trans('Mail encryption is required'),
        ];
    }
}
