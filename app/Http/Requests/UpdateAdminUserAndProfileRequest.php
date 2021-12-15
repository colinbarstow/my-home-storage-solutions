<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class UpdateAdminUserAndProfileRequest extends FormRequest
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
            'first_name' => 'required|max:150',
            'last_name' => 'required|max:150',
//            'email' => [
//                'required',
//                Rule::unique('users')->ignore(Auth::user()->id),
//            ],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'first_name.required' => 'A first name is required',
            'last_name.required' => 'A last name is required',
//            'email.required' => 'An email address is required',
            'first_name.max' => 'The maximum length for your first name has exceeded 150 characters',
            'last_name.max' => 'The maximum length for your last name has exceeded 150 characters',
        ];
    }

}
