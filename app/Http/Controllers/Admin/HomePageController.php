<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\HomePage;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $page_title = 'Home Page Editor';
        $page_description = 'Edit and control the frontend home page';
        $homePage = HomePage::find(1);
        return view('pages.cms.home-page', compact('homePage', 'page_title', 'page_description'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function editAbout()
    {
        $page_title = 'About Page Editor';
        $teams = Team::all();
        $page_description = 'Edit and control the frontend about page';
        $aboutPage = HomePage::find(2);
        $about = About::find(1);
        return view('pages.cms.about-page', compact('aboutPage', 'page_title', 'page_description', 'about', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePage $homePage)
    {
        $homePage->update([
            'show_featured_items' => $this->trueOrFalse($request, 'show_featured_items'),
            'show_daily_special' => $this->trueOrFalse($request, 'show_daily_special'),
            'show_subscribe_to_newsletter' => $this->trueOrFalse($request, 'show_subscribe_to_newsletter'),
            'show_best_sellers' => $this->trueOrFalse($request, 'show_best_sellers'),
            'show_blog' => $this->trueOrFalse($request, 'show_blog'),
            'show_instagram' => $this->trueOrFalse($request, 'show_instagram'),
            'show_parallax' => $this->trueOrFalse($request, 'show_parallax'),
        ]);

        activity()
            ->performedOn($homePage)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Home page updated'])
            ->log('Home page updated');

        return redirect()->route('admin.home-page');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function updateAbout(Request $request, HomePage $aboutPage)
    {
        $aboutPage->update([
            'show_featured_items' => $this->trueOrFalse($request, 'show_featured_items'),
            'show_parallax' => $this->trueOrFalse($request, 'show_parallax'),
        ]);

        About::find(1)->update([
            'body' => $request->body
        ]);

        activity()
            ->performedOn($aboutPage)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'About page updated'])
            ->log('About page updated');

        return redirect()->route('admin.about-page');
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

            $request->file('upload')->storeAs('public/about/ckeditor', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = Storage::url('public/about/ckeditor/'. $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

}
