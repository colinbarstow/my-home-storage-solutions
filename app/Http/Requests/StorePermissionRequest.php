<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


class StorePermissionRequest extends FormRequest
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
            'name' => 'required|unique:permissions|max:150',
            'roles' => 'required',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'roles.required' => 'The permission has to be assigned to at least 1 role',
            'name.required' => 'A name is required for your permission',
            'name.unique' => 'A permission with this title already exists',
            'name.max' => 'The maximum length for your name has exceeded 150 characters',
        ];
    }

}
