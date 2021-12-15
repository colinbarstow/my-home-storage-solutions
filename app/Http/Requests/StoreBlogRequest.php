<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


class StoreBlogRequest extends FormRequest
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
            'title' => 'required|unique:blogs|max:150',
            'blog_category_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'blog_content' => 'required',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required for your blog post',
            'blog_category_id.required' => 'A Category is required for your blog post',
            'title.unique' => 'A blog with this title already exists',
            'title.max' => 'The maximum length for your title has exceeded 150 characters',
            'image.required' => 'An image is required for your blog post',
            'image.mimes' => 'You have uploaded an invalid file format, accepted formats JPEG, JPG, PNG, GIF',
            'image.max' => 'The image you uploaded exceeds the maximum size, please upload files equal to or smaller than 1MB',
            'blog_content.required' => 'You have not added any content to your blog',
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
