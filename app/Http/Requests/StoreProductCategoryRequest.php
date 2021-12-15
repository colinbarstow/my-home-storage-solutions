<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreProductCategoryRequest extends FormRequest
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
            'title' => 'required|unique:product_categories|max:150',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'meta_description' => 'required',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required for your Product category',
            'title.unique' => 'A Product Category with this title already exists',
            'title.max' => 'The maximum length for your title has exceeded 150 characters',
            'image.required' => 'An image is required for your Product Category',
            'image.mimes' => 'You have uploaded an invalid file format, accepted formats JPEG, JPG, PNG, GIF',
            'image.max' => 'The image you uploaded exceeds the maximum size, please upload files equal to or smaller than 1MB',
            'meta_description.required' => 'You have not added a meta description',
        ];
    }

    /**
     *
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'title' => Str::title($this->title),
            'slug' => Str::slug($this->title),
        ]);
    }
}
