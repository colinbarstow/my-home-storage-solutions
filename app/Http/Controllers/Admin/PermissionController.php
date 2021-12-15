<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create new Permission';
        $page_description = 'Create a new Role Permission';
        $roles = Role::all();
        return view('pages.permissions.create', compact( 'page_title', 'page_description', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create(['name' => $request->name]);

        foreach($request->roles as $key => $role){
            $this->assignRoleToPermission($permission, Role::find($key));
        }

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $page_title = 'Editing Permission';
        $page_description = 'Editing the permission ' . $permission->name;
        $roles = Role::all();
        return view('pages.permissions.edit', compact( 'page_title', 'page_description', 'roles', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {

        $permission->update([
            'name' => $request->name
        ]);


        foreach($permission->roles as $role){
            $this->revokeRoleFromPermission($permission, $role);
        }

        if(isset($request->roles)){
            foreach($request->roles as $key => $role){
                $this->assignRoleToPermission($permission, Role::find($key));
            }
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

    public function checkIfPermissionNameCanBeUsed($permission, $name)
    {
        $instance = Permission::where('name', $name)
            ->where('id', '!=', $permission->id)
            ->first();

        if($instance){
            return false;
        } else {
            return true;
        }
    }

    public function assignRoleToPermission(Permission $permission, Role $role)
    {
        $permission->assignRole($role);
    }

    public function syncRolesToPermission(Request $request, Permission $permission)
    {
        $roles = Role::whereIn('id', $request->roles)->get();
        $permission->syncRoles($roles);
    }

    public function revokeRoleFromPermission(Permission $permission, Role $role)
    {
        $permission->removeRole($role);
    }
}
