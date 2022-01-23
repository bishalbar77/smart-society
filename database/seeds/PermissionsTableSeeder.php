<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        Permission::truncate();
        $permissions = [
            [
                'id'    => '1',
                'title' => 'account_access',
            ],
            [
                'id'    => '2',
                'title' => 'reports_create',
            ],
            [
                'id'    => '3',
                'title' => 'reports_edit',
            ],
            [
                'id'    => '4',
                'title' => 'reports_show',
            ],
            [
                'id'    => '5',
                'title' => 'reports_delete',
            ],
            [
                'id'    => '6',
                'title' => 'reports_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'edit-users',
            ],
            [
                'id'    => '14',
                'title' => 'show-users',
            ],
            [
                'id'    => '15',
                'title' => 'delete-users',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'complain_create',
            ],
            [
                'id'    => '18',
                'title' => 'complain_edit',
            ],
            [
                'id'    => '19',
                'title' => 'complain_show',
            ],
            [
                'id'    => '20',
                'title' => 'complain_access',
            ],
            [
                'id'    => '21',
                'title' => 'delete-complain',
            ],
            [
                'id'    => '22',
                'title' => 'visitor_create',
            ],
            [
                'id'    => '23',
                'title' => 'visitor_edit',
            ],
            [
                'id'    => '24',
                'title' => 'visitor_show',
            ],
            [
                'id'    => '25',
                'title' => 'visitor_access',
            ],
            [
                'id'    => '26',
                'title' => 'visitor_delete',
            ],
            [
                'id'    => '27',
                'title' => 'vehicle_create',
            ],
            [
                'id'    => '28',
                'title' => 'vehicle_edit',
            ],
            [
                'id'    => '29',
                'title' => 'vehicle_show',
            ],
            [
                'id'    => '30',
                'title' => 'vehicle_access',
            ],
            [
                'id'    => '31',
                'title' => 'vehicle_delete',
            ],
            [
                'id'    => '32',
                'title' => 'activity_manage',
            ],
            [
                'id'    => '33',
                'title' => 'password_manage',
            ],
            [
                'id'    => '34',
                'title' => 'service_setup',
            ],
            [
                'id'    => '35',
                'title' => 'service_billing',
            ],
            [
                'id'    => '36',
                'title' => 'staff_create',
            ],
            [
                'id'    => '37',
                'title' => 'staff_edit',
            ],
            [
                'id'    => '38',
                'title' => 'staff_show',
            ],
            [
                'id'    => '39',
                'title' => 'staff_access',
            ],
            [
                'id'    => '40',
                'title' => 'staff_delete',
            ],
            [
                'id'    => '41',
                'title' => 'hospitality_create',
            ],
            [
                'id'    => '42',
                'title' => 'hospitality_edit',
            ],
            [
                'id'    => '43',
                'title' => 'hospitality_show',
            ],
            [
                'id'    => '44',
                'title' => 'hospitality_access',
            ],
            [
                'id'    => '45',
                'title' => 'hospitality_delete',
            ],
            [
                'id'    => '46',
                'title' => 'settings',
            ],
            [
                'id'    => '47',
                'title' => 'residents_create',
            ],
            [
                'id'    => '48',
                'title' => 'residents_edit',
            ],
            [
                'id'    => '49',
                'title' => 'residents_show',
            ],
            [
                'id'    => '50',
                'title' => 'residents_access',
            ],
            [
                'id'    => '51',
                'title' => 'residents_delete',
            ],
            [
                'id'    => '52',
                'title' => 'company_profile',
            ],
           
        ];

        Permission::insert($permissions);
    }
}

