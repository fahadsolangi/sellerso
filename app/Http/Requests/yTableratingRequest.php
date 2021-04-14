<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class yTableratingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rating_name'=>'required|max:255|regex:/^[\pL\s\-]+$/u',
            'rating_email'=>'required|email',
            'rating_star'=>'required|max:255',
            'g-recaptcha-response' => 'required',
        ];
    }
}
