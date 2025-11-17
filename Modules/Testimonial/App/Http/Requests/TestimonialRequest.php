<?php

namespace Modules\Testimonial\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
            'rating' => 'required|numeric|between:0,5',
        ];

        if ($this->isMethod('post')) {
            $rules['image'] = 'nullable';
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
            'designation.required' => trans('Designation is required'),
            'image.required' => trans('Image is required'),
            'comment.required' => trans('Comment is required'),
        ];
    }
}
