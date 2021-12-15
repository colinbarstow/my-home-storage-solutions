<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateBlogCategoryRequest extends FormRequest
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
        $id = $this->request->get('blog_category_id');
        return [
            'title' => [
                'required',
                Rule::unique('blog_categories')->ignore($id),
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required for your blog category',
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
