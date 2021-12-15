<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAdminUserAccountRequest;
use App\Http\Requests\UpdateAdminUserAndProfileRequest;
use App\Models\AdminProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
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
        //
    }


    public function overview()
    {
        return view('pages.profile.overview');
    }

    public function personalInformation()
    {
        return view('pages.profile.personal-information');
    }

    public function accountInformation()
    {
        return view('pages.profile.account-information');
    }

    public function changePassword()
    {
        return view('pages.profile.change-password');
    }

    public function updatePassword(Request $request, User $user)
    {

        if(!isset($request->current_password)){
            flash('You need to confirm your current password', 'danger');
            return back();
        }

        if(!isset($request->password)){
            flash('You have not set a new password, nothing has been changed', 'danger');
            return back();
        }

        if(!isset($request->confirm_password)){
            flash('Please confirm your new password', 'danger');
            return back();
        }


        if(!Hash::check($request->current_password, $user->password)){
            flash('Your current password is not correct', 'danger');
            return back();
        }

        if(!$request->password === $request->confirm_password){
            flash('Your passwords do not match', 'danger');
            return back();
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        flash('Your password has been successfully updated', 'success');
        return back();
    }

    public function downloadRecoveryCodes()
    {
        Auth::user()->getCodeFile();
        return Storage::download('public/admin_users/profiles/' . Auth::user()->id . '/recovery_codes/recovery_codes.txt');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminProfile  $adminProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminProfile $adminProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminProfile  $adminProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminUserAndProfileRequest $request, AdminProfile $adminProfile)
    {
        //Check if this account belongs to the user
        if($adminProfile->user->id === Auth::user()->id){
            if(isset($request->profile_avatar)){
                if($adminProfile->image !== null){
                    Storage::delete($adminProfile->image);
                }
                $image = $request->file('profile_avatar')->storeAs('public/admin_users/profiles/' . Auth::user()->id . '/profile_images',  str_replace(' ', '', Auth::user()->fullName()) . '.' .$request->profile_avatar->getClientOriginalExtension());
            } else {
                if($request->profile_avatar_remove !== null){
                    Storage::delete($adminProfile->image);
                    $image = null;
                } else {
                    $image = $adminProfile->image;
                }
            }

            $adminProfile->update([
                'job_title' => $request->job_title,
                'telephone_number' => $request->telephone_number,
                'image' => $image,
                'location' => $request->location,
            ]);


            $adminProfile->user->update([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
            ]);
        } else {
            flash('This is not your account');
        }
        flash('Your personal information has been updated');
        return redirect()->route('admin.profile.personal-information');
    }


    public function updateAccount(UpdateAdminUserAccountRequest $request, AdminProfile $adminProfile)
    {
        //Check if this account belongs to the user
        if($adminProfile->user->id === Auth::user()->id){

            $adminProfile->update([
                'email' => $this->trueOrFalse($request, 'email_c'),
                'sms' => $this->trueOrFalse($request, 'sms'),
                'username' => $request->username,
            ]);


            $adminProfile->user->update([
                'email' => $request->email,
            ]);
        } else {
            flash('This is not your account');
        }
        flash('Your account information has been updated');
        return redirect()->route('admin.profile.account-information');
    }


    private function checkIfEmailHasChangedNadIfItCanBeUpdated($email)
    {
        if($email !== Auth::user()->email){
            //customer has changed email address
            //Check if anyone has already used that email
            $user = User::where('email', $email)
                ->where('id', '!=', Auth::user()->id)
                ->first();
            if(!$user){
                return $email;
            } else {
                return false;
            }
        }
        return $email;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminProfile  $adminProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminProfile $adminProfile)
    {
        //
    }
}
