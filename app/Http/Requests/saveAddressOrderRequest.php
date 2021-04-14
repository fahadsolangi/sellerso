<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Adminiy;

class saveAddressOrderRequest extends FormRequest
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
            "billing_first_name"=>"required",
            "billing_last_name"=>"required",
            "billing_address"=>"required",
            "billing_country"=>"required",
            "billing_state"=>"required",
            "billing_zip"=>"required",
            "email"=>"required",
            "billing_phone"=>"required",
        ];
    }
}
