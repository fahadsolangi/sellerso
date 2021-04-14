<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class yTableUpdatePasswordRequest extends FormRequest
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
    public function messages()
    {
        return [
            'password.required_with' => 'New password must be match to confirm password',
            'newpass.same' => 'New password and confirm password should match',
            'newpass.min' => 'Password should be greater than 8 characters',
            'cnfrmpass.min' => 'Confirm Password should be greater than 8 characters',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'newpass'=>'min:8|required|same:cnfrmpass',
                'cnfrmpass'=>'min:8|required',
        ];
    }
}