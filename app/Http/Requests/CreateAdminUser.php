<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class CreateAdminUser extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'job_title' => 'required|max:100'
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
            'email.required' => 'An email address is required',
            'email.email' => 'Please enter a valid email address',
            'email.max' => 'Your email address is too long, 255 characters maximum',
            'first_name.max' => 'The maximum length for your first name has exceeded 150 characters',
            'last_name.max' => 'The maximum length for your last name has exceeded 150 characters',
            'job_title.required' => 'A Job Title is required',
            'job_title.max' => 'The job title field can only be 100 characters long',
        ];
    }

}
