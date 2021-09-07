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
                'title' => 'room_type_create',
            ],
            [
                'id'    => 19,
                'title' => 'room_type_edit',
            ],
            [
                'id'    => 20,
                'title' => 'room_type_show',
            ],
            [
                'id'    => 21,
                'title' => 'room_type_delete',
            ],
            [
                'id'    => 22,
                'title' => 'room_type_access',
            ],
            [
                'id'    => 23,
                'title' => 'room_create',
            ],
            [
                'id'    => 24,
                'title' => 'room_edit',
            ],
            [
                'id'    => 25,
                'title' => 'room_show',
            ],
            [
                'id'    => 26,
                'title' => 'room_delete',
            ],
            [
                'id'    => 27,
                'title' => 'room_access',
            ],
            [
                'id'    => 28,
                'title' => 'customer_create',
            ],
            [
                'id'    => 29,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 30,
                'title' => 'customer_show',
            ],
            [
                'id'    => 31,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 32,
                'title' => 'customer_access',
            ],
            [
                'id'    => 33,
                'title' => 'employee_create',
            ],
            [
                'id'    => 34,
                'title' => 'employee_edit',
            ],
            [
                'id'    => 35,
                'title' => 'employee_show',
            ],
            [
                'id'    => 36,
                'title' => 'employee_delete',
            ],
            [
                'id'    => 37,
                'title' => 'employee_access',
            ],
            [
                'id'    => 38,
                'title' => 'expense_create',
            ],
            [
                'id'    => 39,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 40,
                'title' => 'expense_show',
            ],
            [
                'id'    => 41,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 42,
                'title' => 'expense_access',
            ],
            [
                'id'    => 43,
                'title' => 'item_table_create',
            ],
            [
                'id'    => 44,
                'title' => 'item_table_edit',
            ],
            [
                'id'    => 45,
                'title' => 'item_table_show',
            ],
            [
                'id'    => 46,
                'title' => 'item_table_delete',
            ],
            [
                'id'    => 47,
                'title' => 'item_table_access',
            ],
            [
                'id'    => 48,
                'title' => 'booking_create',
            ],
            [
                'id'    => 49,
                'title' => 'booking_edit',
            ],
            [
                'id'    => 50,
                'title' => 'booking_show',
            ],
            [
                'id'    => 51,
                'title' => 'booking_delete',
            ],
            [
                'id'    => 52,
                'title' => 'booking_access',
            ],
            [
                'id'    => 53,
                'title' => 'order_create',
            ],
            [
                'id'    => 54,
                'title' => 'order_edit',
            ],
            [
                'id'    => 55,
                'title' => 'order_show',
            ],
            [
                'id'    => 56,
                'title' => 'order_delete',
            ],
            [
                'id'    => 57,
                'title' => 'order_access',
            ],
            [
                'id'    => 58,
                'title' => 'payment_create',
            ],
            [
                'id'    => 59,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 60,
                'title' => 'payment_show',
            ],
            [
                'id'    => 61,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 62,
                'title' => 'payment_access',
            ],
            [
                'id'    => 63,
                'title' => 'reminder_create',
            ],
            [
                'id'    => 64,
                'title' => 'reminder_edit',
            ],
            [
                'id'    => 65,
                'title' => 'reminder_show',
            ],
            [
                'id'    => 66,
                'title' => 'reminder_delete',
            ],
            [
                'id'    => 67,
                'title' => 'reminder_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
