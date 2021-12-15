<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class UpdateAdminUserAccountRequest extends FormRequest
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
            'username' => [
                'required',
                Rule::unique('admin_profiles')->ignore(Auth::user()->id),
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'username.required' => 'A username is required',
            'email.required' => 'An email address is required',
        ];
    }

}
