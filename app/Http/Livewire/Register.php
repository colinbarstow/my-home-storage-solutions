<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $registerEmail;

    public $registerPassword;

    public $registerPasswordConfirm;

    public $registerFirstName;

    public $registerLastName;

    public $registerError = null;

    public function register()
    {
        if($this->checkIfEmailIsValid()){

            $this->checkIfCanBeRegistered();

            if($this->registerError === null){

                $this->registerUser();

            }

        }

        return;
    }

    public function registerUser()
    {
        $user = User::create([
            'first_name' => $this->registerFirstName,
            'last_name' => $this->registerLastName,
            'email' => $this->registerEmail,
            'password' => Hash::make($this->registerPassword),
        ]);
    }

    public function checkIfEmailIsValid()
    {
        if($this->registerEmail === null){

            $this->registerError = 'Please enter your email address';

            return false;

        } elseif(!filter_var($this->registerEmail, FILTER_VALIDATE_EMAIL)){

            $this->registerError = 'Please enter a valid email address';

            return false;

        } else {

            $this->registerError = null;

            return true;

        }
    }

    public function checkIfCanBeRegistered()
    {

        $user = User::where('email', $this->registerEmail)->first();

        if($user){

            $this->registerError = 'An account with this email already exists';
            return;

        }

        if($this->registerPassword === null){

            $this->registerError = 'You have not entered a password';
            return;
        }

        if($this->registerPasswordConfirm === null){

            $this->registerError = 'You have not confirmed your password';
            return;

        }

        if($this->registerPasswordConfirm !== $this->registerPassword){

            $this->registerError = 'Your passwords do not match';
            return;

        }

        if($this->registerFirstName === null){

            $this->registerError = 'Your have not entered a first name';
            return;

        }

        if($this->registerFirstName === null){

            $this->registerError = 'Your have not entered a last name';
            return;

        }

    }

    public function render()
    {
        return view('livewire.register');
    }
}
