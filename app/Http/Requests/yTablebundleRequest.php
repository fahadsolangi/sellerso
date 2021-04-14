<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class yTablebundleRequest extends FormRequest
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
            'bundle_name'  => 'required',
            'bundle_discount'  => 'required|numeric',
            'subscription'  => 'required|numeric',
        ];
    }
}
