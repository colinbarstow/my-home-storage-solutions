<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShippingRequest;
use App\Models\Shipping;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $shippings = Shipping::orderBy('id', 'desc')->get();
        $page_title = 'Shipping Templates';
        $page_description = 'From here you can view and manage your existing Shipping templates.';

        return view('pages.shipping-templates.index', compact('page_title', 'page_description', 'shippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $page_title = 'New Shipping Template';
        $page_description = 'Use the form below to create a new Shipping template';

        return view('pages.shipping-templates.create', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreShippingRequest $request
     * @return RedirectResponse
     */
    public function store(StoreShippingRequest $request): RedirectResponse
    {
        $shipping = Shipping::create([
            'description' => $request->description,
            'carrier' => $request->carrier,
            'delivery_time' => $request->delivery_time,
        ]);

        activity()
            ->performedOn($shipping)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Shipping Template Created'])
            ->log('New Shipping Template created');

        flash('The Shipping template has been successfully created', 'success');

        return redirect()->route('admin.shipping-templates.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Shipping $shipping_template
     * @return Application|Factory|View|Response
     */
    public function edit(Shipping $shipping_template)
    {
        $page_title = 'Edit Shipping Template';
        $page_description = 'Use the form below to update the Shipping template';

        return view('pages.shipping-templates.edit', compact('page_title', 'page_description', 'shipping_template'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreShippingRequest $request
     * @param Shipping $shipping_template
     * @return RedirectResponse
     */
    public function update(StoreShippingRequest $request, Shipping $shipping_template): RedirectResponse
    {
        $shipping_template->update([
            'description' => $request->description,
            'carrier' => $request->carrier,
            'delivery_time' => $request->delivery_time,
        ]);

        activity()
            ->performedOn($shipping_template)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Shipping Template Updated'])
            ->log('New Shipping Template updated');

        flash('The Shipping template has been successfully updated', 'success');

        return redirect()->route('admin.shipping-templates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Shipping $shipping_template
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Shipping $shipping_template): RedirectResponse
    {
        if($shipping_template->canBeDeleted()){

            activity()
                ->performedOn($shipping_template)
                ->causedBy(Auth::user())
                ->withProperties(['customProperty' => 'Shipping template deleted'])
                ->log('Shipping Template deleted');

            flash('The Shipping template has been successfully deleted', 'success');

            $shipping_template->delete();

            return back();
        } else {
            flash('This Shipping Template can not be deleted', 'danger');
            return back();
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

            $request->file('upload')->storeAs('public/shipping-templates/ckeditor', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = Storage::url('public/shipping-templates/ckeditor/'. $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
