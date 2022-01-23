<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $super_per = Permission::all();
        $admin_permissions = Permission::all()->filter(function ($permission) 
        {
            return substr($permission->title, 0, 8) != 'account_'
            && substr($permission->title, 0, 8) != 'reports_';
        });
        Role::find(1)->permissions()->sync($super_per->pluck('id'));
        Role::find(2)->permissions()->sync($admin_permissions->pluck('id'));
        Role::find(6)->permissions()->sync($super_per->pluck('id'));
    }
}