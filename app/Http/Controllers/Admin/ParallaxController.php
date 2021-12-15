<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use App\Models\Parallax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ParallaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parallaxes = Parallax::orderBy('home_page_id', 'asc')->get();
        $page_title = 'Parallax Modules';
        $page_description = 'From here you can view and manage your Parallax modules.';

        return view('pages.parallax.index', compact('page_title', 'page_description', 'parallaxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'New Parallax Module';
        $pages = HomePage::orderBy('page_title', 'asc')->get();
        $page_description = 'Use the form below to create a new Parallax Module';

        return view('pages.parallax.create', compact('page_title', 'page_description', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = HomePage::find($request->home_page_id);

        $parallax = Parallax::create([
            'home_page_id' => $request->home_page_id,
            'image' => $request->file('image')->storeAs('public/parallax/',  Str::slug($page->page_title) . '.' .$request->image->getClientOriginalExtension()),
            'pre_title' => $request->pre_title,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'link' => $request->link,
            'button_text' => $request->button_text,
            'active' => $this->trueOrFalse($request, 'active'),
        ]);

        activity()
            ->performedOn($parallax)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Parallax created'])
            ->log('Parallax created');

        return redirect()->route('admin.parallax.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parallax  $parallax
     * @return \Illuminate\Http\Response
     */
    public function show(Parallax $parallax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parallax  $parallax
     * @return \Illuminate\Http\Response
     */
    public function edit(Parallax $parallax)
    {
        $page_title = 'Edit Parallax Module';
        $pages = HomePage::orderBy('page_title', 'asc')->get();
        $page_description = 'Use the form below to edit your Parallax Module';

        return view('pages.parallax.edit', compact('page_title', 'page_description', 'pages', 'parallax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parallax  $parallax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parallax $parallax)
    {
        $page = HomePage::find($request->home_page_id);

        if(isset($request->image)){
            $image = $request->file('image')->storeAs('public/parallax/',  Str::slug($page->page_title) . '.' .$request->image->getClientOriginalExtension());
        } else {
            $image = $parallax->image;
        }

        $parallax->update([
            'home_page_id' => $request->home_page_id,
            'image' => $image,
            'pre_title' => $request->pre_title,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'link' => $request->link,
            'button_text' => $request->button_text,
            'active' => $this->trueOrFalse($request, 'active'),
        ]);

        activity()
            ->performedOn($parallax)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Parallax updated'])
            ->log('Parallax updated');

        return redirect()->route('admin.parallax.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parallax  $parallax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parallax $parallax)
    {
        //
    }
}
