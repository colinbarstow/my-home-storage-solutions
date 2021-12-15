<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


class StoreBlogCategoryRequest extends FormRequest
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
            'title' => 'required|unique:blog_categories|max:150',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required for your blog category',
            'title.unique' => 'A blog category with this title already exists',
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
