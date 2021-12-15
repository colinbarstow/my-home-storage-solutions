<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Models\Client;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->get();
        $page_title = 'Clients';
        $page_description = 'From here you can view and manage your existing Clients.';

        return view('pages.clients.index', compact('page_title', 'page_description', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'New Client';
        $page_description = 'Use the form below to create a new Client';

        return view('pages.clients.create', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $img = Image::make($request->file('image'))->encode($request->image->getClientOriginalExtension());

        $img->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $fileName = $request->image->getClientOriginalName().'.' .$request->image->getClientOriginalExtension();


        $thumb = clone   $img;
        $thumb->resize(280, 280, function ($constraint) {
            $constraint->aspectRatio();
        });

        $thumb->stream();

        Storage::put($this->getUploadPath($fileName), $thumb);

        $client = Client::create([
            'image' => $this->getUploadPath($fileName),
        ]);

        activity()
            ->performedOn($client)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Client Created'])
            ->log('New Client created');


        return redirect()->route('admin.clients.index');
    }

    public function  getUploadPath($filename){
        return 'public/product-categories/' . $filename;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $page_title = 'Edit Client';
        $page_description = 'Use the form below to edit your Client';

        return view('pages.clients.edit', compact('page_title', 'page_description', 'client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $img = Image::make($request->file('image'))->encode($request->image->getClientOriginalExtension());

        $img->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $fileName = $request->image->getClientOriginalName().'.' .$request->image->getClientOriginalExtension();


        $thumb = clone   $img;
        $thumb->resize(280, 280, function ($constraint) {
            $constraint->aspectRatio();
        });

        $thumb->stream();

        Storage::put($this->getUploadPath($fileName), $thumb);

        Storage::delete($client->image);

        $client->update([
            'image' => $this->getUploadPath($fileName),
        ]);

        activity()
            ->performedOn($client)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Client Updated'])
            ->log('New Client updated');


        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index');
    }
}
