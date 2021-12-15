<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogFacebook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogFacebookController extends Controller
{
    public function postBlogToFacebook(BlogFacebook $facebookBlog)
    {
        $blog = $facebookBlog->blog;
        //todo
    }

    public function isActive()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $scheduledTime = Carbon::parse($this->facebookPost->scheduled_time)->format('Y-m-d H:i:s');
        if($now > $scheduledTime){
            return false;
        } else {
            return true;
        }
    }

    public function index()
    {
        $blogs = BlogFacebook::where('posted', true)
            ->orderBy('id', 'desc')
            ->get();
        $page_title = 'Live Facebook Blog Posts';
        $page_description = 'From here you can view and manage your Live Facebook Blog Posts.';

        return view('pages.facebook-blog-posts.index', compact('page_title', 'page_description', 'blogs'));
    }

    public function queuedPosts()
    {
        $blogs = BlogFacebook::where('posted', false)
            ->orderBy('id', 'desc')
            ->get();
        $page_title = 'Queued Facebook Blog Posts';
        $page_description = 'From here you can view and manage your Queued Facebook Blog Posts.';

        return view('pages.facebook-blog-posts.queued', compact('page_title', 'page_description', 'blogs'));
    }

    public function edit(BlogFacebook $facebook_post)
    {
        $blog = $facebook_post->blog;
        $page_title = 'Edit Facebook scheduled time';
        $page_description = 'Use the form below to edit your Facebook scheduled time';

        return view('pages.facebook-blog-posts.edit', compact('page_title', 'page_description', 'blog'));
    }

    public function update(Request $request, BlogFacebook $facebook_post)
    {
        $facebook_post->update([
            'scheduled_time' => Carbon::parse($request->scheduled_time)->format('Y-m-d H:i:s')
        ]);

        activity()
            ->performedOn($facebook_post)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Facebook post updated'])
            ->log('Facebook post updated');

        return redirect()->route('admin.facebook-posts.index');
    }

}
