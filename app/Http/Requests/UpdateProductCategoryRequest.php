<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateProductCategoryRequest extends FormRequest
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
        $id = $this->request->get('product_category_id');
        return [
            'title' => [
                'required',
                Rule::unique('product_categories')->ignore($id),
            ],
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'meta_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required for your Product Category',
            'title.max' => 'The maximum length for your title has exceeded 150 characters',
            'image.mimes' => 'You have uploaded an invalid file format, accepted formats JPEG, JPG, PNG, GIF',
            'image.max' => 'The image you uploaded exceeds the maximum size, please upload files equal to or smaller than 1MB',
            'meta_description.required' => 'You have not added a description to your Product Category',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'title' => Str::title($this->title),
            'slug' => Str::slug($this->title),
        ]);
    }
}
