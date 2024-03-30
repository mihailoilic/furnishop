<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEditProductRequest extends FormRequest
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
            "subcategories"=>"required|array|exists:categories,id",
            "name"=>"required|string|min:3",
            "colors"=>"required|array|min:1|exists:colors,id",
            "price"=>"required|numeric",
            "description"=>"required|string|min:10|max:300"

        ];
    }
}
