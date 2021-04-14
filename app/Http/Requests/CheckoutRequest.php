<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Adminiy;

class CheckoutRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

   /* public function messages()
    {
        return [
            'email.exists'=>'Email does not exist',
        ];
    }*/
    public function rules()
    {
        return [
            "billing_first_name"=>"required|regex:/^[\pL\s\-]+$/u",
            "billing_last_name"=>"required|regex:/^[\pL\s\-]+$/u",
            "billing_zip"=>"required|numeric|min:5",
            "billing_phone"=>"required|numeric",
            "billing_country"=>"required",
            "billing_address"=>"required",
        ];
    }
}
