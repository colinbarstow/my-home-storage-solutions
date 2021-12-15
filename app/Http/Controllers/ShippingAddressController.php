<?php

namespace App\Http\Controllers;

use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingAddressController extends Controller
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
        if(Auth::user()->defaultShippingAddress()){
            $default = $this->trueOrFalse($request, 'default');
        } else {
            $default = true;
        }

        if($default === true){
            $currentDefaults = ShippingAddress::where('user_id', Auth::user()->id)
                ->where('default', true)
                ->get();
            foreach($currentDefaults as $current){
                $current->update([
                        'default' => false]
                );
            }
        }

        return ShippingAddress::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'first_line' => $request->first_line,
            'second_line' => $request->second_line,
            'third_line' => $request->third_line,
            'city' => $request->city,
            'county' => $request->county,
            'postcode' => $request->postcode,
            'notes' => $request->notes,
            'default' => $default,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingAddress $shippingAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingAddress $shippingAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingAddress $shippingAddress)
    {
        if(Auth::user()->defaultShippingAddress()){
            $default = $this->trueOrFalse($request, 'default');
        } else {
            $default = true;
        }

        if($default === true){
            $currentDefaults = ShippingAddress::where('user_id', Auth::user()->id)
                ->where('default', true)
                ->get();
            foreach($currentDefaults as $current){
                $current->update([
                        'default' => false]
                );
            }
        }

        $shippingAddress->update([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'first_line' => $request->first_line,
            'second_line' => $request->second_line,
            'third_line' => $request->third_line,
            'city' => $request->city,
            'county' => $request->county,
            'postcode' => $request->postcode,
            'notes' => $request->notes,
            'default' => $default,
        ]);

        return $shippingAddress->refresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingAddress $shippingAddress)
    {
        if($shippingAddress->canBeDeleted()){
            if($shippingAddress->default){
                $shippings = Auth::user()->allOtherShippingAddresses()->first();
                $shippings->update([
                    'default' => true
                ]);
            }
            $shippingAddress->delete();
        }
    }
}
