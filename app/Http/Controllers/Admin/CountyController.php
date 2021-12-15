<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counties = County::orderBy('name', 'asc')->get();
        $page_title = 'Counties';
        $page_description = 'From here you can view and manage your Counties.';

        return view('pages.counties.index', compact('page_title', 'page_description', 'counties'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function show(County $county)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function edit(County $county)
    {
        $page_title = 'Edit County';
        $page_description = 'Use the form below to edit your County';

        return view('pages.counties.edit', compact('page_title', 'page_description', 'county'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, County $county)
    {
        $county->update([
            'name' => $request->name,
            'price' => $request->price*100
        ]);

        flash('County successfully updated', 'success');

        return redirect()->route('admin.counties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\County  $county
     * @return \Illuminate\Http\Response
     */
    public function destroy(County $county)
    {
        //
    }
}
