<?php

namespace App\Http\Controllers\Admin;

use App\Events\AdminUserCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminUser;
use App\Models\AdminProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::has('roles')->orderBy('last_name', 'asc')->get();
        $page_title = 'Admin Users';
        $page_description = 'Manage your Admin Users';
        $roles = Role::all();
        return view('pages.admin-users.index', compact('users', 'page_title', 'page_description', 'roles'));
    }

    public function changeRole(Request $request, User $user)
    {
        $user->roles()->detach();
        $user->assignRole(Role::find($request->role));

        flash('The role has been successfully changed');

        return redirect()->back();
    }

    public function create()
    {
        $page_title = 'Create new Admin User';
        $page_description = 'Create a new Admin User to access the Admin portal';
        $roles = Role::all();


        return view('pages.admin-users.create', compact( 'page_title', 'page_description', 'roles'));
    }

    public function store(CreateAdminUser $request)
    {
        $password = $this->createRandomPassword();

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($password)
        ]);

        $profile = AdminProfile::create([
            'user_id' => $user->id,
            'job_title' => Str::title($request->job_title),
            'username' => $this->createUserName($request),
        ]);

        $user->assignRole(Role::find($request->role));

        activity()
            ->performedOn($user)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'User Created'])
            ->log('New Admin User created');

        AdminUserCreated::dispatch($user, $password);

        flash('The User has been successfully created');

        return redirect()->route('admin.admin-users.index');
    }

    public function createUserName($request)
    {
        $username = strtolower($request->first_name . $request->last_name);

        $actual_name = $username;

        $i = 1;

        while($this->checkIfUserWithUsernameExists($actual_name))
        {
            $actual_name = (string)$username . $i;

            $i++;
        }

        return $actual_name;
    }

    public function checkIfUserWithUsernameExists($name)
    {
        if(AdminProfile::where('username', $name)->first()){
            return true;
        }
        return false;
    }


    public function destroy(User $user)
    {
        $this->removeFromBlogs($user);

        $user->delete();

        activity()
            ->performedOn($user)
            ->causedBy(Auth::user())
            ->withProperties(['customProperty' => 'Admin User Deleted'])
            ->log('Admin User Deleted');

        flash('The User has been successfully deleted');
    }

    private function createRandomPassword()
    {
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 10 );
    }

    public function removeFromBlogs($user)
    {
        if($user->blogs->count() > 0){
            foreach($user->blogs as $blog){
                $blog->update([
                    'written_by' => null,
                    'last_edited_by' => null,
                ]);
            }
        }
    }

}
