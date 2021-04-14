<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class yTablepackageRequest extends FormRequest
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
            'slug'  => 'required|string|unique:package,id',
            'price' => 'required|max:22|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
        ];
    }
}