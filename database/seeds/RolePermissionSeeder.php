<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //assign permissions to admin role
        $admin_permissions = Permission::whereIn('name', Permission::ADMIN_PERMISSION)->get();
        $admin_role = Role::where('name', Role::ROLE_ADMIN)->first();
        $admin_role->permissions()->attach($admin_permissions);

        //assign permissions to reader role
        $reader_permissions = Permission::whereIn('name', Permission::READER_PERMISSION)->get();
        $reader_role = Role::where('name', Role::ROLE_READER)->first();
        $reader_role->permissions()->attach($reader_permissions);
    }
}
