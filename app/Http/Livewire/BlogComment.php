<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BlogComment extends Component
{

    public $blog;

    public $comments = null;

    public $count = 0;

    public $comment;

    public $name;

    public $email;

    public $complete = false;

    public function mount()
    {
        $this->comments = $this->blog->comments()->orderBy('id', 'desc')->get();
        $this->count    = $this->comments->count();
    }

    public function update()
    {
        $this->comments = $this->blog->comments()->orderBy('id', 'desc')->get();
        $this->count    = $this->comments->count();
    }


    public function submit()
    {
        \App\Models\BlogComment::create([
            'blog_id' => $this->blog->id,
            'name' => $this->name,
            'email' => $this->email,
            'comment' => $this->comment,
        ]);

        $this->complete = true;
        $this->update();
    }

    public function submitAuth()
    {
        \App\Models\BlogComment::create([
            'blog_id' => $this->blog->id,
            'user_id' => Auth::user()->id,
            'email' => $this->email,
            'comment' => $this->comment,
        ]);

        $this->complete = true;
        $this->update();

    }

    public function render()
    {
        return view('livewire.blog-comment');
    }
}
