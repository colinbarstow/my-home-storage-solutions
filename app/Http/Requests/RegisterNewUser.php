<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterNewUser extends FormRequest
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
        $this->redirect = route('registration-error');

        return [
            'first_name' => 'required|max:150',
            'last_name'  => 'required|max:150',
            'email'      => 'required|email:rfc,dns|unique:users|',
            'password'   => 'confirmed|min:8',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'A first name is required',
            'last_name.required' => 'A last name is required',
            'email.unique' => 'An account with this email already exists',
            'email.required' => 'An email address is required',
            'password.required' => 'A password is required',
            'password.confirmed' => 'Your passwords do not match',
        ];
    }
}
