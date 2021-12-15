<?php

namespace App\Http\Controllers;

use App\Models\BillingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingAddressController extends Controller
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

        if(Auth::user()->defaultBillingAddress()){
            $default = $this->trueOrFalse($request, 'default');
        } else {
            $default = true;
        }

        if($default === true){
            $currentDefaults = BillingAddress::where('user_id', Auth::user()->id)
                ->where('default', true)
                ->get();
            foreach($currentDefaults as $current){
                $current->update([
                        'default' => false]
                );
            }
        }

        return BillingAddress::create([
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
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function show(BillingAddress $billingAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(BillingAddress $billingAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillingAddress $billingAddress)
    {

        if(Auth::user()->defaultBillingAddress()){
            $default = $this->trueOrFalse($request, 'default');
        } else {
            $default = true;
        }

        if($default === true){
            $currentDefaults = BillingAddress::where('user_id', Auth::user()->id)
                ->where('default', true)
                ->get();
            foreach($currentDefaults as $current){
                $current->update([
                        'default' => false]
                );
            }
        }

        $billingAddress->update([
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

        return $billingAddress->refresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillingAddress $billingAddress)
    {
        if($billingAddress->canBeDeleted()){
            if($billingAddress->default){
                $billings = Auth::user()->allOtherBillingAddresses()->first();
                $billings->update([
                    'default' => true
                ]);
            }
            $billingAddress->delete();
        }
    }
}
