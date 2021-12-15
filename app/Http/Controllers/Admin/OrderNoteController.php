<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderNoteController extends Controller
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
        $note = OrderNote::create([
            'type'     => $request->note_type,
            'message'  => $request->message,
            'order_id' => $request->order_id,
        ]);

        activity()
            ->performedOn($note)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Order note created'])
            ->log('Order note created');

        flash('Note successfully added to order', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderNote  $orderNote
     * @return \Illuminate\Http\Response
     */
    public function show(OrderNote $orderNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderNote  $orderNote
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderNote $orderNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderNote  $orderNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderNote $orderNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderNote  $orderNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderNote $orderNote)
    {
        //
    }
}
