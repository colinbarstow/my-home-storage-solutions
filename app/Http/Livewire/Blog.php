<?php

namespace App\Http\Livewire;

use App\Models\BlogCategory;
use Livewire\Component;

class Blog extends Component
{
    public $blogs = null;
    public $populars = null;
    public $categories = null;

    public function mount()
    {
        $this->blogs = \App\Models\Blog::where('active', true)
            ->orderBy('id', 'desc')
            ->with('category')
            ->get();

        $this->populars = \App\Models\Blog::popularPosts(2);

        $this->categories = BlogCategory::orderBy('title','asc')->get();
    }

    public function switchCategory($id)
    {
        $this->blogs = \App\Models\Blog::where('active', true)
            ->where('blog_category_id', $id)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.blog');
    }
}
