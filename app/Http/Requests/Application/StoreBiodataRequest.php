<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class StoreBiodataRequest extends FormRequest
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
            'passport_number' => ['required', 'unique:bio_data,passport_number'],
            'gender' => ['required'],
            'birthday' => ['required'],
            'lga' => ['required'],
            'phone' => ['required', 'digits:11'],
            'place_of_birth' => ['required'],
            'address' => ['required'],
            'town' => ['required'],
            'occupation' => ['required'],
            'height' => ['required'],
            'next_of_kin' => ['required'],
            'marital_status' => ['required'],
            'next_of_kin_phone' => ['required', 'digits:11'],
            'passport' => ['required', 'mimes:png,jpg,webp', 'max:5024'],

        ];
    }
}
