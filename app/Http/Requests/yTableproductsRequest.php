<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class yTableproductsRequest extends FormRequest
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
            'name'  => 'required',
            'slug'  => 'required|unique:products,id',
            'product_by'  => 'required',
            'price'  => 'required',
            'dev_phone'  => 'required',
            'dev_email'  => 'required',
            'dev_website'  => 'required',
            'video_link'  => 'required',
            'functionality'  => 'required',
            'features'  => 'required',
            'description'  => 'required',
            'whoshould'  => 'required',
            'pricing_information'  => 'required',
        ];
    }
}
