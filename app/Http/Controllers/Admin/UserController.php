<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::doesntHave('roles')->orderBy('last_name', 'asc')->get();
        $page_title = 'Customers';
        $page_description = 'Manage your Customers';
        return view('pages.users.index', compact('users', 'page_title', 'page_description'));
    }



    public function destroy(User $user)
    {

        $user->delete();

        flash('The Customer has been successfully deleted');
    }

}
