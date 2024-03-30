<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "firstname"=>"required|string|regex:/\p{L}[\p{L}\s]+/u",
            "lastname"=>"required|string|regex:/\p{L}[\p{L}\s]+/u",
            "email"=>"required|email|unique:users,email",
            "password"=>[
                "required",
                "string",
                "min:6",
                "regex:/\p{Lu}/u",
                "regex:/\p{Ll}/u",
                "regex:/\d/"
            ],
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
            'password.required' => 'Password is required',
            "password.min" => "Password must be at least 6 characters long",
            "password.regex" => "Password must contain at least one uppercase letter, one lowercase letter and one digit",
        ];
    }
}
