<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateBlogRequest extends FormRequest
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
        $id = $this->request->get('blog_id');
        return [
            'title' => [
                'required',
                Rule::unique('blogs')->ignore($id),
            ],
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'blog_category_id' => 'required',
            'blog_content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required for your blog post',
            'blog_category_id.required' => 'A Category is required for your blog post',
            'title.max' => 'The maximum length for your title has exceeded 150 characters',
            'image.mimes' => 'You have uploaded an invalid file format, accepted formats JPEG, JPG, PNG, GIF',
            'image.max' => 'The image you uploaded exceeds the maximum size, please upload files equal to or smaller than 1MB',
            'blog_content.required' => 'You have not added any content to your blog',
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
