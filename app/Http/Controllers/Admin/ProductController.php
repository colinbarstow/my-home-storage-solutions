<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Shipping;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    /**
     * Returns all the products
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $page_title = 'Products';
        $page_description = 'From here you can view and manage your existing Products.';

        return view('pages.products.index', compact('page_title', 'page_description', 'products'));
    }


    /**
     * Show the form for creating a new product.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        if(ProductCategory::all()->count() > 0){
            if(Shipping::all()->count() > 0){
                $page_title = 'New Product';
                $page_description = 'Use the form below to create a new Product';

                $productCategories = ProductCategory::orderBy('title', 'asc')->get();

                $shippings = Shipping::orderBy('carrier', 'asc')->get();

                return view('pages.products.create', compact('page_title', 'page_description', 'productCategories', 'shippings'));
            } else {
                flash('You can not create a product because you have not created a shipping template. Please use the form below to create a shipping template', 'danger');
                return redirect()->route('admin.shipping-templates.create');
            }

        } else {
            flash('You can not create a product because you have not created a product category. Please use the form below to create a product category', 'danger');
            return redirect()->route('admin.product-categories.create');
        }

    }


    /**
     * Store a newly created product in storage.
     *
     * @param StoreProductRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'product_category_id' => $request->product_category_id,
            'shipping_id' => $request->shipping_id,
            'title' => $request->title,
            'slug'  => $request->slug,
            'price'  => $request->price,
            'meta_description' => $request->meta_description,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'additional' => $request->additional,
            'active' => $this->trueOrFalse($request, 'active'),
            'featured' => $this->trueOrFalse($request, 'featured'),
        ]);


        activity()
            ->performedOn($product)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Product Created'])
            ->log('New Product created');


        return redirect()->route('admin.products.edit', $product->id);
    }


    /**
     * Show the form for editing the specified product.
     *
     * @param Product $product
     *
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
        $page_title = 'Edit Product';
        $page_description = 'Use the form below to edit your Product';

        $productCategories = ProductCategory::orderBy('title', 'asc')->get();

        $shippings = Shipping::orderBy('carrier', 'asc')->get();

        return view('pages.products.edit', compact('page_title', 'page_description', 'productCategories', 'product', 'shippings'));
    }

    public function createASale(Product $product)
    {
        $page_title = 'Create a sale for ' . $product->title;

        $page_description = 'Use the form below to create a sale for your product';

        return view('pages.products.create-sale', compact('page_title', 'page_description', 'product'));
    }

    public function updateASale(Request $request, Product $product)
    {
        if(isset($request->sale_price)){
            if($request->sale_price == 0){
                $sale = null;
            } else {
                $sale = $request->sale_price*100;
            }
        } else {
            $sale = null;
        }


        $product->update([
            'sale_price' => $sale
        ]);

        flash('You have successfully updated the products sale price', 'success');

        return redirect()->route('admin.products.index');
    }


    /**
     * Update the specified product in storage.
     *
     * @param UpdateProductRequest $request
     *
     * @param Product $product
     *
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update([
            'product_category_id' => $request->product_category_id,
            'shipping_id' => $request->shipping_id,
            'title' => $request->title,
            'slug'  => $request->slug,
            'price'  => $request->price,
            'meta_description' => $request->meta_description,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'additional' => $request->additional,
            'active' => $this->trueOrFalse($request, 'active'),
            'featured' => $this->trueOrFalse($request, 'featured'),
        ]);


        activity()
            ->performedOn($product)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Product Updated'])
            ->log('Product updated');


        return redirect()->route('admin.products.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        if($product->canBeDeleted()){
            flash('The product has been successfully deleted', 'success');

            activity()
                ->performedOn($product)
                ->causedBy(Auth::user())
                ->withProperties(['customProperty' => 'Product Created'])
                ->log('New Product created');

            foreach($product->images as $image){
                Storage::delete($image->thumbnail);
                Storage::delete($image->image);
                $image->delete();
            }

            foreach($product->attributes as $att){
                $att->delete();
            }

            $product->delete();

            return back();
        } else {
            flash('This product can not be deleted', 'danger');
            return back();
        }
    }
}
