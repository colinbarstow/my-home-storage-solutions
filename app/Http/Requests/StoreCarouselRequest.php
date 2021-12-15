<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


class StoreCarouselRequest extends FormRequest
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
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'image.mimes' => 'You have uploaded an invalid file format, accepted formats JPEG, JPG, PNG, GIF',
            'image.max' => 'The image you uploaded exceeds the maximum size, please upload files equal to or smaller than 1MB',
            'image.required' => 'An Image is required',
        ];
    }

}
