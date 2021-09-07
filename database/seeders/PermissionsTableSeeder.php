<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'patient_create',
            ],
            [
                'id'    => 19,
                'title' => 'patient_edit',
            ],
            [
                'id'    => 20,
                'title' => 'patient_show',
            ],
            [
                'id'    => 21,
                'title' => 'patient_delete',
            ],
            [
                'id'    => 22,
                'title' => 'patient_access',
            ],
            [
                'id'    => 23,
                'title' => 'doctor_create',
            ],
            [
                'id'    => 24,
                'title' => 'doctor_edit',
            ],
            [
                'id'    => 25,
                'title' => 'doctor_show',
            ],
            [
                'id'    => 26,
                'title' => 'doctor_delete',
            ],
            [
                'id'    => 27,
                'title' => 'doctor_access',
            ],
            [
                'id'    => 28,
                'title' => 'lab_create',
            ],
            [
                'id'    => 29,
                'title' => 'lab_edit',
            ],
            [
                'id'    => 30,
                'title' => 'lab_show',
            ],
            [
                'id'    => 31,
                'title' => 'lab_delete',
            ],
            [
                'id'    => 32,
                'title' => 'lab_access',
            ],
            [
                'id'    => 33,
                'title' => 'inpatient_create',
            ],
            [
                'id'    => 34,
                'title' => 'inpatient_edit',
            ],
            [
                'id'    => 35,
                'title' => 'inpatient_show',
            ],
            [
                'id'    => 36,
                'title' => 'inpatient_delete',
            ],
            [
                'id'    => 37,
                'title' => 'inpatient_access',
            ],
            [
                'id'    => 38,
                'title' => 'outpatient_create',
            ],
            [
                'id'    => 39,
                'title' => 'outpatient_edit',
            ],
            [
                'id'    => 40,
                'title' => 'outpatient_show',
            ],
            [
                'id'    => 41,
                'title' => 'outpatient_delete',
            ],
            [
                'id'    => 42,
                'title' => 'outpatient_access',
            ],
            [
                'id'    => 43,
                'title' => 'room_create',
            ],
            [
                'id'    => 44,
                'title' => 'room_edit',
            ],
            [
                'id'    => 45,
                'title' => 'room_show',
            ],
            [
                'id'    => 46,
                'title' => 'room_delete',
            ],
            [
                'id'    => 47,
                'title' => 'room_access',
            ],
            [
                'id'    => 48,
                'title' => 'bill_create',
            ],
            [
                'id'    => 49,
                'title' => 'bill_edit',
            ],
            [
                'id'    => 50,
                'title' => 'bill_show',
            ],
            [
                'id'    => 51,
                'title' => 'bill_delete',
            ],
            [
                'id'    => 52,
                'title' => 'bill_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
