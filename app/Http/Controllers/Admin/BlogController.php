<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogFacebook;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->get();
        $page_title = 'Blog Posts';
        $page_description = 'From here you can view and manage your existing Blog Posts.';

        return view('pages.blogs.index', compact('page_title', 'page_description', 'blogs'));
    }


    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function create()
    {
        if(BlogCategory::all()->count() > 0){
            $page_title = 'New Blog Post';
            $page_description = 'Use the form below to create a new Blog Post';
            $categories = BlogCategory::orderBy('title', 'asc')->get();

            return view('pages.blogs.create', compact('page_title', 'page_description', 'categories'));
        } else {
            flash('You need to create a blog category first, please use the form below to create a blog category', 'warning');
            return redirect()->route('admin.blog-categories.create');
        }

    }


    /**
     * @param StoreBlogRequest $request
     * @return RedirectResponse
     */
    public function store(StoreBlogRequest $request): RedirectResponse
    {
        $blog = Blog::create([
            'title' => $request->title,
            'blog_category_id' => $request->blog_category_id,
            'slug'  => $request->slug,
            'image' => $request->file('image')->storeAs('public/blogs/', strtolower($request->slug) . '.' .$request->image->getClientOriginalExtension()),
            'content' => $request->blog_content,
            'active' => $this->trueOrFalse($request, 'active'),
            'featured' => $this->trueOrFalse($request, 'featured'),
            'written_by' => Auth::user()->id ?? null,
        ]);

        activity()
            ->performedOn($blog)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Blog Created'])
            ->log('New Blog Post created');

        $this->shouldThisBlogPostToFacebook($request, $blog);

        flash('Your blog post was successfully created', 'success');

        return redirect()->route('admin.blogs.index');
    }


    /**
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function edit(Blog $blog)
    {
        $page_title = 'Edit Blog Post';
        $page_description = 'Use the form below to edit your Blog Post';
        $categories = BlogCategory::orderBy('title', 'asc')->get();

        return view('pages.blogs.edit', compact('page_title', 'page_description', 'blog', 'categories'));
    }


    /**
     * @param UpdateBlogRequest $request
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function update(UpdateBlogRequest $request, Blog $blog): RedirectResponse
    {
        if(isset($request->image)){
            Storage::delete($blog->image);
            $request->file('image')->storeAs('public/blogs/', strtolower($request->slug) . '.' .$request->image->getClientOriginalExtension());
        } else {
            $image = $blog->image;
        }

        $blog->update([
            'title' => $request->title,
            'blog_category_id' => $request->blog_category_id,
            'slug'  => $request->slug,
            'image' => $image,
            'content' => $request->blog_content,
            'active' => $this->trueOrFalse($request, 'active'),
            'featured' => $this->trueOrFalse($request, 'featured'),
            'written_by' => Auth::user()->id ?? null,
        ]);

        activity()
            ->performedOn($blog)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Blog Updated'])
            ->log('Blog Post updated');

        $res = $this->doesThisUpdateEffectTheFacebookPost($request, $blog);

        flash('Your blog post was successfully updated', 'success');

        return redirect()->route('admin.blogs.index');


    }

    /**
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function show(Blog $blog)
    {
        $page_title = 'Blog Analytics';
        $page_description = 'Read and how your blog is performing';

        return view('pages.blogs.analytics', compact('page_title', 'page_description', 'blog'));
    }

    /**
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function preDelete(Blog $blog)
    {
        $page_title = 'Delete Blog Post';
        $page_description = 'Read and confirm your decision to delete this Blog Post';

        return view('pages.blogs.pre-delete', compact('page_title', 'page_description', 'blog'));
    }


    /**
     * @param Blog $blog
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Blog $blog)
    {
        if($blog->facebookPost){
            if($blog->facebookPost->posted){
                $blog->facebookPost->deleteFromFacebook();
            }
            $blog->facebookPost->delete();
        }

        if($blog->hasCampaign()){
            $blog->campaign->delete();
        }

        activity()
            ->performedOn($blog)
            ->causedBy(Auth::user())
            ->withProperties([
                'customProperty' => 'Blog Deleted',
                'deletedModelName' => $blog->title
            ])
            ->log('Blog Post deleted');

        $blog->delete();

        flash('Your blog post was successfully deleted', 'success');

        return redirect()->route('admin.blogs.index');
    }

    /**
     * @param $title
     * @param $blog
     * @return bool
     */
    public function hasUniqueTitleOrOldTitle($title, $blog): bool
    {
        $existing = Blog::where('title', $title)->where('id', '!=', $blog->id)->first();
        if($existing){
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $request
     * @param $blog
     */
    public function shouldThisBlogPostToFacebook($request, $blog)
    {
        if(isset($request->post_to_facebook)){
            $facebook = BlogFacebook::create([
                'blog_id' => $blog->id,
                'scheduled_time' => $this->facebookScheduledTime($request),
                'posted' => false,
            ]);

            activity()
                ->performedOn($facebook)
                ->causedBy(Auth::user())
                ->withProperties(['customProperty' => 'Facebook Blog Created'])
                ->log('Facebook Blog Post created');
        }
    }

    /**
     * @param $request
     * @param $blog
     * @return string
     */
    public function doesThisUpdateEffectTheFacebookPost($request, $blog): string
    {
        if(isset($request->post_to_facebook)){
            if($blog->facebookPost){
                $newTime = Carbon::parse($request->scheduled_time)->format('Y-m-d H:i:s');
                $currentTime = Carbon::parse($blog->facebookPost->scheduled_time)->format('Y-m-d H:i:s');
                $now = Carbon::now()->format('Y-m-d H:i:s');
                if($newTime != $currentTime){
                    if($currentTime < $now){
                        return 'failed';
                    } else {
                        $blog->facebookPost->update([
                            'scheduled_time' => $this->facebookScheduledTime($request),
                        ]);

                        activity()
                            ->performedOn($blog->facebookPost)
                            ->causedBy(Auth::user())
                            ->withProperties(['customProperty' => 'Facebook Blog Updated'])
                            ->log('Facebook Blog Post updated');

                        return 'updated';
                    }
                }
            } else {
                $facebook = BlogFacebook::create([
                    'blog_id' => $blog->id,
                    'scheduled_time' => $this->facebookScheduledTime($request),
                    'posted' => false,
                ]);

                activity()
                    ->performedOn($facebook)
                    ->causedBy(Auth::user())
                    ->withProperties(['customProperty' => 'Facebook Blog Created'])
                    ->log('Facebook Blog Post created');

                return 'created';
            }
        } else {
            if($blog->facebookPost){
                //todo delete from facebook
                $blog->facebookPost->delete();
                return 'deleted';
            } else {
                return 'nothing';
            }
        }
    }

    /**
     * @param $request
     * @return string
     */
    public function facebookScheduledTime($request): string
    {
        if(isset($request->scheduled_time)){
            return Carbon::parse($request->scheduled_time)->format('Y-m-d H:i:s');
        } else {
            return Carbon::now()->format('Y-m-d H:i:s');
        }
    }

    /**
     * @param Request $request
     */
    public function uploadImagesFromCKEditor(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->storeAs('public/blogs/ckeditor', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = Storage::url('public/blogs/ckeditor/'. $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
