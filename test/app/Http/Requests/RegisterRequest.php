<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "name"=>["required"],
            "phone"=>["required","regex:/^01[0125][0-9]{8}$/","unique:users"],
            "email"=>["required","email"],
            "password"=>["required","confirmed","min:8"],
            "device_name"=>["required"],


        ];
    }
}
