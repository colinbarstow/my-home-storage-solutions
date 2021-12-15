<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UserAccount extends Component
{
    public $firstname;

    public $lastname;

    public $email;

    public $password;

    public $newPassword;

    public $confirmedPassword;

    public $user;

    public $showMessage = false;

    public $message;

    public $passwordError = null;

    protected function rules()
    {
        return [
            'firstname' => 'required',
            'lastname'  => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->user->id),
            ],
        ];
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->firstname = $this->user->first_name;
        $this->lastname  = $this->user->last_name;
        $this->email     = $this->user->email;
    }

    public function submit()
    {
        $this->validate();
        $user = Auth::user();
        $user->first_name = $this->firstname;
        $user->last_name = $this->lastname;
        $user->email = $this->email;
        $user->save();

        $this->message = 'Account details updated';

        if($this->password !== null){
            if(!Hash::check($this->password, $user->password)){
                $this->passwordError = 'Your old password is incorrect';
            } else {
                if($this->newPassword !== null){
                    if($this->confirmedPassword !== null){
                        if($this->newPassword === $this->confirmedPassword){
                            $user->password = Hash::make($this->newPassword);
                            $user->save();
                            $this->message = 'Password successfully updated';
                            $this->passwordError = null;
                        } else {
                            $this->passwordError = 'Your new passwords do not match';
                        }
                    } else {
                        $this->passwordError = 'You need to confirm your new password';
                    }
                } else {
                    $this->passwordError = 'Your have not entered a new password';
                }
            }
        }

        $this->showMessage = true;

    }

    public function render()
    {
        return view('livewire.user-account');
    }
}
