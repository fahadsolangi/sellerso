<?php



namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;



class AccountInfoRequest extends FormRequest

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

    /*public function messages()

    {

        return [

            'first_name.required' => 'New password must be match to confirm password',

            'last_name.requried' => 'New password and confirm password should match',

            ];

    }*/

    /**

     * Get the validation rules that apply to the request.

     *

     * @return array

     */

    public function rules()

    {

        return [

                'first_name'=>'required|regex:/^[\pL\s\-]+$/u',

                'last_name'=>'required|regex:/^[\pL\s\-]+$/u',
                'phone'=>'numeric',
                'zipcode'=>'numeric|min:6',

        ];

    }

}