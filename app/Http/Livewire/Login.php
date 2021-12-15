<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $signinEmail;

    public $signinEmailError = null;

    public $signinPassword;

    public $signinError = null;

    public function signin()
    {
        if($this->checkIfEmailIsValid()){

            $this->checkIfCanBeLoggedIn();

            if($this->signinError === null){

                $this->signinComplete();

            }

        }

        return;
    }

    public function signinComplete()
    {
        return redirect()->route('checkout');
    }

    public function checkIfEmailIsValid()
    {
        if($this->signinEmail === null){

            $this->signinError = 'Please enter your email address';

            return false;

        } elseif(!filter_var($this->signinEmail, FILTER_VALIDATE_EMAIL)){

            $this->signinError = 'Please enter a valid email address';

            return false;

        } else {

            $this->signinError = null;

            return true;

        }
    }

    public function checkIfCanBeLoggedIn()
    {
        $user = User::where('email', $this->signinEmail)->first();

        if($user){

            $credentials = [
                'email' => $this->signinEmail,
                'password' => $this->signinPassword,
            ];

            if(Auth::attempt($credentials)){
                $this->signinError = null;

            } else {

                $this->signinError = 'Your password is incorrect';

            }

        } else {

            $this->signinError = 'There is no account registered with this email';

        }

    }

    public function render()
    {
        return view('livewire.login');
    }
}
