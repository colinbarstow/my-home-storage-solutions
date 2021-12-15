<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::orderBy('title', 'asc')->get();
        $page_title = 'Product Categories';
        $page_description = 'From here you can view and manage your existing Product Categories.';

        return view('pages.product-categories.index', compact('page_title', 'page_description', 'productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'New Product Category';
        $page_description = 'Use the form below to create a new Product Category';

        return view('pages.product-categories.create', compact('page_title', 'page_description'));
    }

    private function createImage($request)
    {
        return Image::make($request->file('image'))->encode($request->image->getClientOriginalExtension());
    }

    private function imageFileName($slug, $request)
    {
        return Str::slug(strtolower($slug)).'.' .$request->image->getClientOriginalExtension();
    }

    private function imageHandler($request)
    {
        //create an intervention instance
        $img = $this->createImage($request);

        $fileName = $this->imageFileName($request->slug, $request);

        $img->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $high =  clone $img;

        Storage::put($this->getUploadPath($fileName, "original"), $high);


        $thumb = clone $img;


        $thumb->fit(280, 280, function ($constraint) {
            $constraint->upsize();
        });

        $thumb->stream();

        Storage::put($this->getUploadPath($fileName, "thumbnail"), $thumb);

        return $fileName;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryRequest $request)
    {
        $fileName = $this->imageHandler($request);

        $productCategory = ProductCategory::create([
            'title' => $request->title,
            'slug'  => $request->slug,
            'meta_description' => $request->meta_description,
            'description' => $request->description,
            'image' => $this->getUploadPath($fileName, "original"),
            'thumbnail' => $this->getUploadPath($fileName, "thumbnail"),
            'active' => $this->trueOrFalse($request, 'active'),
            'featured' => $this->trueOrFalse($request, 'featured'),
        ]);

        activity()
            ->performedOn($productCategory)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Product Category Created'])
            ->log('New Product Category created');

        flash('The product category has been successfully created', 'success');

        return redirect()->route('admin.product-categories.index');
    }

    public function  getUploadPath($filename, $quality){
        return 'public/product-categories/' . $quality . '/' . $filename;
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        $page_title = 'Edit Product Category';
        $page_description = 'Use the form below to edit your Product Category';

        return view('pages.product-categories.edit', compact('page_title', 'page_description', 'productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        if(isset($request->image)){
            Storage::delete($productCategory->image);
            Storage::delete($productCategory->thumbnail);

            $fileName = $this->imageHandler($request);

            $image = $this->getUploadPath($fileName, "original");
            $thumbnail = $this->getUploadPath($fileName, "thumbnail");

        } else {
            $image = $productCategory->image;
            $thumbnail = $productCategory->thumbnail;
        }

        $productCategory->update([
            'title' => $request->title,
            'slug'  => $request->slug,
            'image' => $image,
            'thumbnail' => $thumbnail,
            'description' => $request->description,
            'meta_description' => $request->meta_description,
            'active' => $this->trueOrFalse($request, 'active'),
            'featured' => $this->trueOrFalse($request, 'featured'),
        ]);

        activity()
            ->performedOn($productCategory)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Product Category Updated'])
            ->log('Product Category updated');

        flash('The product category has been successfully updated', 'success');

        return redirect()->route('admin.product-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        if($productCategory->canBeDeleted()){
            Storage::delete($productCategory->image);
            Storage::delete($productCategory->thumbnail);
            activity()
                ->performedOn($productCategory)
                ->causedBy(Auth::user())
                ->withProperties(['customProperty' => 'Product Category Deleted'])
                ->log('Product Category deleted');
            $productCategory->delete();
            flash('The product category has been successfully deleted', 'success');
        } else {
            flash('The product category can not be deleted', 'danger');
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

            $request->file('upload')->storeAs('public/product-categories/ckeditor', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = Storage::url('public/product-categories/ckeditor/'. $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    /**
     * @param ProductCategory $productCategory
     */
    public function preDelete(ProductCategory $productCategory)
    {
        $page_title = 'Delete Product Category';
        $page_description = 'Read and confirm your decision to delete this Product Category';

        return view('pages.product-categories.pre-delete', compact('page_title', 'page_description', 'productCategory'));
    }
}
