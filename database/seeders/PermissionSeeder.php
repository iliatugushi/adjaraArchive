<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Admin;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Admins
        Permission::create(['name' => 'create_admins', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit_admins', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_admins', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete_admins', 'guard_name' => 'admin']);

        // Anaweri
        Permission::create(['name' => 'create_anaweris', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit_anaweris', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_anaweris', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete_anaweris', 'guard_name' => 'admin']);

        // Archive
        Permission::create(['name' => 'create_archives', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit_archives', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_archives', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete_archives', 'guard_name' => 'admin']);

        // Creator
        Permission::create(['name' => 'create_creators', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit_creators', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_creators', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete_creators', 'guard_name' => 'admin']);

        // File
        Permission::create(['name' => 'create_files', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit_files', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_files', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete_files', 'guard_name' => 'admin']);

        // Fond
        Permission::create(['name' => 'create_fonds', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit_fonds', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_fonds', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete_fonds', 'guard_name' => 'admin']);

        // Sakme
        Permission::create(['name' => 'create_sakmes', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit_sakmes', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_sakmes', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete_sakmes', 'guard_name' => 'admin']);

        // Type
        Permission::create(['name' => 'create_types', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit_types', 'guard_name' => 'admin']);
        Permission::create(['name' => 'view_types', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete_types', 'guard_name' => 'admin']);

        Permission::create(['name' => 'create_roles', 'guard_name' => 'admin']);
        Permission::create(['name' => 'edit_roles', 'guard_name' => 'admin']);
        Permission::create(['name' => 'delete_roles', 'guard_name' => 'admin']);


        // this can be done as separate statements
        $role = Role::create(['guard_name' => 'admin', 'name' => 'Administrator']);
        $role->givePermissionTo(Permission::all());

        $user = Admin::where('id', 1)->first();
        $user->assignRole($role);
    }
}
