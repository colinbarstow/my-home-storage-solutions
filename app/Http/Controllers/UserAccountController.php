<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterNewUser;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function loginModal()
    {
        return view('front.components.login-modal');
    }

    public function register(RegisterNewUser $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password)
        ]);

        activity()
            ->performedOn($user)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'User Registered'])
            ->log('New Site User registered');

        //event here

    }

    public function registerError()
    {
        return view('front.pages.auth.registration-error');
    }

    public function show()
    {
        $orders = Auth::user()->orders()->orderBy('id', 'desc')->get();
        return view('front.pages.account.show', compact('orders'));
    }

    public function singleOrder(Order $order)
    {
        return view('front.pages.account.single-order', compact('order'));
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            return redirect()->intended('my-account');
        }

    }

    public function updateUserAccount(UpdateUserRequest $request)
    {
        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;

        if(isset($request->old_password)){
            if(Hash::check($request->old_password, $user->password)){
                if(isset($request->password)){
                    if(isset($request->password_confirmed)){
                        if($request->password === $request->password_confirmed){
                            $user->password = Hash::make($request->password);
                        } else {
                            //Passwords dont match
                            return 'nomatch';
                        }
                    } else {
                        //Please confirm your new password
                        return 'confirm';
                    }
                } else {
                    //password not changed because new one not given
                    return 'nonew';
                }
            } else {
                //Old password isnt correct
                return 'old';
            }
        }

        $user->save();

        return redirect()->back();

    }

    public function updateDefaultBillingAddress(Request $request)
    {

    }
}
