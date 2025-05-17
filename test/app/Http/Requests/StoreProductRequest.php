<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           "name_en" => ["required", "string", "max:255", "min:15"],
            "name_ar" => ["required", "string", "max:255", "min:15"],
            "price" => ["required", "numeric", "max:99999.99", "min:1"],
            "desc_en" => ["required", "string"],
            "desc_ar" => ["required", "string"],
            "code" => ["required", "integer", "unique:products"],
            "image" => ["required", "max:1000", "mimes:png,jpg,jpeg"],
            "subcategory_id" => ["required", "exists:subcategories,id", "integer"],
            "brand_id" => ["required", "integer", "exists:brands,id"],
            "status" => ["required", "integer", "between:0,1"],
            "quantity" => ["nullable", "integer", "max:999", "min:1"],
        ];
    }
}
