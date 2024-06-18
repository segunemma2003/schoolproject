<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "family"=>"required",
            "scientific_name"=>"required|unique:plants",
            "okun" => "required",
            "ebira"=>"required",
            "igala" => "required",
            "common_name"=>"required",
            "part_used"=>"required",
            "medicinal_use"=>"required",
            "picture"=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
