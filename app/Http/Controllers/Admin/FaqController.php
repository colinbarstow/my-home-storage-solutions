<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::orderBy('id', 'desc')->get();
        $page_title = 'Faqs';
        $page_description = 'From here you can view and manage your existing Faqs.';

        return view('pages.faqs.index', compact('page_title', 'page_description', 'faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'New Faq';
        $page_description = 'Use the form below to create a new Faq';

        return view('pages.faqs.create', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faq = Faq::create([
            'question' => $request->question,
            'answer'  => $request->answer,
        ]);

        activity()
            ->performedOn($faq)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Faq Created'])
            ->log('New Faq created');

        flash('Your faq was successfully created', 'success');

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $page_title = 'Edit Faq';
        $page_description = 'Use the form below to edit your Faq';

        return view('pages.faqs.edit', compact('page_title', 'page_description', 'faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $faq->update([
            'question' => $request->question,
            'answer'  => $request->answer,
        ]);

        activity()
            ->performedOn($faq)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Faq Updated'])
            ->log('New Faq updated');

        flash('Your faq was successfully updated', 'success');

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        activity()
            ->performedOn($faq)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Faq Deleted'])
            ->log('New Faq deleted');

        $faq->delete();

        flash('Your faq was successfully deleted', 'success');

        return back();
    }
}
