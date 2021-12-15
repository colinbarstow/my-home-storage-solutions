<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductImageController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        $count = $product->images->count();

        if($count === 0){
            $fileBaseName = $product->slug;
        } else {
            $counter = $count+1;
            $fileBaseName = $product->slug . '-' . $counter;
        }

        $img = Image::make($request->file)->encode($request->file->getClientOriginalExtension());

        $img->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });


        $fileName = strtolower($fileBaseName) . '.' . $request->file->getClientOriginalExtension();


        $high = clone $img;

        Storage::put($this->getUploadPath($fileName, "original", $product->slug), $high);


        $thumb = clone   $img;
        $thumb->resize(280, 280, function ($constraint) {
            $constraint->aspectRatio();
        });

        $thumb->stream();

        Storage::put($this->getUploadPath($fileName, "thumbnail", $product->slug), $thumb);

        if($product->images->count() > 0){
            $default = false;
        } else {
            $default = true;
        }
        $image = ProductImage::create([
            'product_id' => $product->id,
            'image'      => $this->getUploadPath($fileName, "original", $product->slug),
            'thumbnail'  => $this->getUploadPath($fileName, "original", $product->slug),
            'main'    => $default
        ]);

        activity()
            ->performedOn($image)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Product image created'])
            ->log('Product image created');

        return [
            'image' => Storage::url($image->image),
            'route' => route('admin.product-images.update', $image->id),
            'id' => $image->id,
            'main' => $default
        ];

    }

    public function  getUploadPath($filename, $quality, $slug){
        return 'public/products/' . $slug . '/images/' . $quality . '/' . $filename;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $productImage)
    {
        $main = $request->main;

        foreach($productImage->images as $image){
            $image->update([
                'main' => false
            ]);
        }

        if(isset($request->delete)){

            foreach($request->delete as $key => $i){

                if($productImage->images->count() > 1){
                    $ima = ProductImage::find($key);
                    Storage::delete($ima->thumbnail);
                    Storage::delete($ima->image);
                    activity()
                        ->performedOn($ima)
                        ->causedBy(Auth::user())
                        ->withProperties(['customProperty' => 'Product image deleted'])
                        ->log('Product image deleted');
                    $ima->delete();
                }

            }

        }

        $im = ProductImage::find($main);

        if($im){
            $im->update([
                'main' => true
            ]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $productImage)
    {
        //
    }
}
