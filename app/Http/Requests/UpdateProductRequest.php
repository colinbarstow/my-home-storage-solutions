<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
        $id = $this->request->get('product_id');

        return [
            'title' => [
                'required',
                Rule::unique('products')->ignore($id),
            ],
            'price' => 'required',
            'meta_description' => 'required',
            'description' => 'required',
            'product_category_id' => 'required',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required for your Product',
            'title.unique' => 'A Product with this title already exists',
            'title.max' => 'The maximum length for your title has exceeded 150 characters',
            'meta_description.required' => 'You have not added a meta description',
            'description.required' => 'You have not added a description',
            'product_category_id.required' => 'You have not selected a product category',
            'price.required' => 'A price is required for your Product',
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
            'price' => $this->price*100,
        ]);
    }
}
