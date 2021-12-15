<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;
use App\Models\BlogCategory;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $categories = BlogCategory::orderBy('id', 'desc')->get();
        $page_title = 'Blog Categories';
        $page_description = 'From here you can view and manage your existing Blog category.';

        return view('pages.blog-categories.index', compact('page_title', 'page_description', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $page_title = 'New Blog Category';
        $page_description = 'Use the form below to create a new Blog Category';

        return view('pages.blog-categories.create', compact('page_title', 'page_description'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBlogCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(StoreBlogCategoryRequest $request): RedirectResponse
    {
        $category = BlogCategory::create([
            'title' => $request->title,
            'slug'  => $request->slug,
        ]);

        activity()
            ->performedOn($category)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Blog Category Created'])
            ->log('New Blog Category created');

        flash('Your blog category was successfully created', 'success');

        return redirect()->route('admin.blog-categories.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param BlogCategory $blogCategory
     * @return Application|Factory|View|Response
     */
    public function edit(BlogCategory $blogCategory)
    {
        $page_title = 'Edit Blog Category';
        $page_description = 'Use the form below to edit your Blog Category';
        $category = $blogCategory;

        return view('pages.blog-categories.edit', compact('page_title', 'page_description', 'category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param BlogCategory $blogCategory
     * @return RedirectResponse
     */
    public function update(UpdateBlogCategoryRequest $request, BlogCategory $blogCategory): RedirectResponse
    {
        $blogCategory->update([
            'title' => $request->title,
            'slug'  => $request->slug,
        ]);

        activity()
            ->performedOn($blogCategory)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Blog Category Updated'])
            ->log('New Blog Category updated');

        flash('Your blog category was successfully updated', 'success');

        return redirect()->route('admin.blog-categories.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param BlogCategory $blogCategory
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(BlogCategory $blogCategory): RedirectResponse
    {
        if($blogCategory->blogs->count() > 0){
            flash('Your blog category can not be deleted as it has blogs attached to it', 'danger');

            return redirect()->route('admin.blog-categories.index');
        } else {
            activity()
                ->performedOn($blogCategory)
                ->causedBy(Auth::user())
                ->withProperties(['customProperty' => 'Blog Category Deleted'])
                ->log('New Blog Category deleted');
            $blogCategory->delete();
            flash('Your blog category has been successfully deleted', 'success');

            return redirect()->route('admin.blog-categories.index');
        }
    }
}
