<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //Create all roles
        $super   = Role::create(['name' => 'Super Admin']);
        $admin   = Role::create(['name' => 'Admin']);
        $editor  = Role::create(['name' => 'Editor']);
        $content = Role::create(['name' => 'Content Writer']);

        // create county permissions
        Permission::create(['name' => 'view counties']);
        Permission::create(['name' => 'create counties']);
        Permission::create(['name' => 'edit counties']);
        Permission::create(['name' => 'delete counties']);

        // create cms permissions
        Permission::create(['name' => 'view cms']);
        Permission::create(['name' => 'edit cms']);
        Permission::create(['name' => 'view carousel']);
        Permission::create(['name' => 'create carousel']);
        Permission::create(['name' => 'edit carousel']);
        Permission::create(['name' => 'delete carousel']);
        Permission::create(['name' => 'view parallax']);
        Permission::create(['name' => 'create parallax']);
        Permission::create(['name' => 'edit parallax']);
        Permission::create(['name' => 'delete parallax']);

        // create order permissions
        Permission::create(['name' => 'view orders']);
        Permission::create(['name' => 'manage orders']);
        Permission::create(['name' => 'cancel orders']);
        Permission::create(['name' => 'accept orders']);
        Permission::create(['name' => 'note orders']);
        Permission::create(['name' => 'prompt orders']);

        // create shipping template permissions
        Permission::create(['name' => 'view shipping templates']);
        Permission::create(['name' => 'create shipping templates']);
        Permission::create(['name' => 'edit shipping templates']);
        Permission::create(['name' => 'delete shipping templates']);

        // create product categories permissions
        Permission::create(['name' => 'view product categories']);
        Permission::create(['name' => 'create product categories']);
        Permission::create(['name' => 'edit product categories']);
        Permission::create(['name' => 'delete product categories']);

        // create product permissions
        Permission::create(['name' => 'view products']);
        Permission::create(['name' => 'create products']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);
        Permission::create(['name' => 'sale products']);

        // create clients permissions
        Permission::create(['name' => 'view clients']);
        Permission::create(['name' => 'create clients']);
        Permission::create(['name' => 'edit clients']);
        Permission::create(['name' => 'delete clients']);

        // create teams permissions
        Permission::create(['name' => 'view teams']);
        Permission::create(['name' => 'create teams']);
        Permission::create(['name' => 'edit teams']);
        Permission::create(['name' => 'delete teams']);

        // create blog category permissions
        Permission::create(['name' => 'view blog categories']);
        Permission::create(['name' => 'create blog categories']);
        Permission::create(['name' => 'edit blog categories']);
        Permission::create(['name' => 'delete blog categories']);

        // create blog permissions
        Permission::create(['name' => 'view blog posts']);
        Permission::create(['name' => 'create blog posts']);
        Permission::create(['name' => 'edit blog posts']);
        Permission::create(['name' => 'delete blog posts']);
        Permission::create(['name' => 'view facebook blog posts']);
        Permission::create(['name' => 'edit facebook blog posts']);
        Permission::create(['name' => 'delete facebook blog posts']);

        // create campaign permissions
        Permission::create(['name' => 'view campaigns']);
        Permission::create(['name' => 'create campaigns']);
        Permission::create(['name' => 'edit campaigns']);
        Permission::create(['name' => 'delete campaigns']);

        // create faq permissions
        Permission::create(['name' => 'view faqs']);
        Permission::create(['name' => 'create faqs']);
        Permission::create(['name' => 'edit faqs']);
        Permission::create(['name' => 'delete faqs']);

        // create contacts permissions
        Permission::create(['name' => 'view contacts']);
        Permission::create(['name' => 'send contacts']);
        Permission::create(['name' => 'delete contacts']);

        // create role permissions
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);

        // create permission permissions
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'delete permissions']);

        // create admin users permissions
        Permission::create(['name' => 'view admin users']);
        Permission::create(['name' => 'create admin users']);
        Permission::create(['name' => 'change admin user role']);
        Permission::create(['name' => 'delete admin users']);

        // create users permissions
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'site config']);

        // assign all permissions to super admin
        $super->givePermissionTo(Permission::all());

        // assign permissions to admin
        $admin->givePermissionTo([
            'view blog categories',
            'create blog categories',
            'edit blog categories',
            'delete blog categories',
            'view blog posts',
            'create blog posts',
            'edit blog posts',
            'delete blog posts',
            'view facebook blog posts',
            'edit facebook blog posts',
            'delete facebook blog posts',
            'view campaigns',
            'create campaigns',
            'edit campaigns',
            'delete campaigns',
            'view faqs',
            'create faqs',
            'edit faqs',
            'delete faqs',
            'view contacts',
            'send contacts',
            'delete contacts',
            'view admin users',
            'create admin users',
            'view products',
            'create products',
            'edit products',
            'delete products',
            'sale products',
            'site config',
            'view shipping templates',
            'create shipping templates',
            'edit shipping templates',
            'delete shipping templates',
            'view product categories',
            'create product categories',
            'edit product categories',
            'delete product categories',
            'view counties',
            'create counties',
            'edit counties',
            'delete counties',
            'view cms',
            'edit cms',
            'view carousel',
            'create carousel',
            'edit carousel',
            'delete carousel',
            'view parallax',
            'create parallax',
            'delete parallax',
            'view orders',
            'manage orders',
            'cancel orders',
            'accept orders',
            'note orders',
            'prompt orders',
            'view clients',
            'create clients',
            'edit clients',
            'delete clients',
            'view teams',
            'create teams',
            'edit teams',
            'delete teams',
        ]);

        // assign permissions to editor
        $editor->givePermissionTo([
            'view blog categories',
            'create blog categories',
            'edit blog categories',
            'delete blog categories',
            'view blog posts',
            'create blog posts',
            'edit blog posts',
            'delete blog posts',
            'view campaigns',
            'create campaigns',
            'edit campaigns',
            'delete campaigns',
            'view faqs',
            'create faqs',
            'edit faqs',
            'delete faqs',
            'view orders',
            'note orders',
            'view cms',
            'edit cms',
            'view carousel',
            'create carousel',
            'edit carousel',
            'delete carousel',
            'view parallax',
            'create parallax',
            'delete parallax',
        ]);

        // assign permissions to content writer
        $content->givePermissionTo([
            'view blog categories',
            'create blog categories',
            'edit blog categories',
            'view blog posts',
            'create blog posts',
            'edit blog posts',
            'view campaigns',
            'create campaigns',
            'edit campaigns',
            'view orders',
            'note orders',
            'view cms',
            'edit cms',
            'view carousel',
            'create carousel',
            'view parallax',
            'create parallax',
        ]);


        $user = User::find(1);

        $user->assignRole($super);
    }
}
