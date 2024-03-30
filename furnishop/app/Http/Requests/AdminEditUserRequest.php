<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEditUserRequest extends FormRequest
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
            "first"=>"required|string|regex:/\p{L}[\p{L}\s]+/u",
            "last"=>"required|string|regex:/\p{L}[\p{L}\s]+/u",
            "email"=>"required|email|unique:users,email,$this->id,id",
        ];
    }

    public function messages()
    {
        return [

            "firstname.required" => "First name is required",
            "firstname.regex"=> "First name must contain only letters (and spaces if needed)",
            "lastname.required" => "Last name is required",
            "lastname.regex"=> "Last name must contain only letters (and spaces if needed)",
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',

        ];
    }
}
