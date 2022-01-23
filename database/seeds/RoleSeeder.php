<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //increment function so that we will be able to see all users... user id increament
        Role::truncate();
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'Owner']);
        Role::create(['name' => 'Tenant']);
        Role::create(['name' => 'Security']);
        Role::create(['name' => 'Society President']);
    }
}
