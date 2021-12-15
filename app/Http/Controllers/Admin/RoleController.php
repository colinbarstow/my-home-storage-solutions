<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $page_title = 'User Roles';
        $page_description = 'Manage your User Roles';
        return view('pages.roles.index', compact('roles', 'page_title', 'page_description', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create new Role';
        $page_description = 'Create a new User Role';
        return view('pages.roles.create', compact( 'page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $page_title = 'Editing Role';
        $page_description = 'Editing the role ' . $role->name;
        return view('pages.roles.edit', compact( 'page_title', 'page_description', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if($this->checkIfRoleNameCanBeUsed($role, $request->name)){
            $role->update([
                'name' => $request->name
            ]);
        }
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkIfRoleNameCanBeUsed($role, $name)
    {
        $instance = Role::where('name', $name)
            ->where('id', '!=', $role->id)
            ->first();

        if($instance){
            return false;
        } else {
            return true;
        }
    }

    public function assignPermissionToRole(Role $role, Permission $permission)
    {
        $role->givePermissionTo($permission);
    }

    public function syncPermissionsToRole(Request $request, Role $role)
    {
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);
    }

    public function revokePermissionFromRole(Role $role, Permission $permission)
    {
        $role->revokePermissionTo($permission);
    }
}
