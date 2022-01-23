<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $adminRole = Role::where('name', 'admin')->first();

        $admin = User::create([
            'name' => 'Super',
            'email' => 'super@admin.com',
            'phone' => '7485962587',
            'ltname' => 'Admin',
            'district' => 'Sundergarh',
            'country' => 'India',
            'dob' => '2000-07-01',
            'state' => 'Odisha',
            'city' => 'BBSR',
            'pincode' => '769004',
            'add' => 'DL/4, Civil Township',
            'password' => Hash::make('admin')
        ]);
        
        $admin->roles()->attach($adminRole);
    }
}
