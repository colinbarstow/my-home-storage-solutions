<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarouselRequest;
use App\Models\HomePageCarouselImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomePageCarouselImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create new Home Page Carousel Image';
        $page_description = 'Use the form below to create a new Home Page Carousel Image';

        return view('pages.cms.create-home-page-carousel-image', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarouselRequest $request)
    {
        $c = HomePageCarouselImage::create([
            'home_page_id' => 1,
            'image' => $request->file('image')->store('public/pages/home/carousel_images'),
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'text' => $request->text,
            'button_text' => $request->button_text,
            'button_url' => $request->button_url,
            'active' => $this->trueOrFalse($request, 'active'),
            'position' => $this->setPosition(),
            'text_colour' => $request->text_colour,
        ]);

        activity()
            ->performedOn($c)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Carousel Image created'])
            ->log('Carousel Image created');

        return redirect()->route('admin.home-page');
    }

    public function setPosition()
    {
        $images = HomePageCarouselImage::orderBy('position', 'desc')->get();
        if($images->count() > 0){
            $last = $images->last();
            return $last->position+1;
        } else {
            return 1;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomePageCarouselImage  $homePageCarouselImage
     * @return \Illuminate\Http\Response
     */
    public function show(HomePageCarouselImage $homePageCarouselImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePageCarouselImage  $homePageCarouselImage
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePageCarouselImage $homePageCarouselImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $image
     * @param  \App\Models\HomePageCarouselImage  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePageCarouselImage $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePageCarouselImage  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePageCarouselImage $image)
    {
        Storage::delete($image->image);

        $image->delete();

        activity()
            ->performedOn($image)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Carousel Image deleted'])
            ->log('Carousel Image deleted');

        flash('Carousel image successfully deleted');

        return back();
    }
}
