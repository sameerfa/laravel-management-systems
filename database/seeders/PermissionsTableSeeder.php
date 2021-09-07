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
                'title' => 'book_create',
            ],
            [
                'id'    => 19,
                'title' => 'book_edit',
            ],
            [
                'id'    => 20,
                'title' => 'book_show',
            ],
            [
                'id'    => 21,
                'title' => 'book_delete',
            ],
            [
                'id'    => 22,
                'title' => 'book_access',
            ],
            [
                'id'    => 23,
                'title' => 'binding_create',
            ],
            [
                'id'    => 24,
                'title' => 'binding_edit',
            ],
            [
                'id'    => 25,
                'title' => 'binding_show',
            ],
            [
                'id'    => 26,
                'title' => 'binding_delete',
            ],
            [
                'id'    => 27,
                'title' => 'binding_access',
            ],
            [
                'id'    => 28,
                'title' => 'category_create',
            ],
            [
                'id'    => 29,
                'title' => 'category_edit',
            ],
            [
                'id'    => 30,
                'title' => 'category_show',
            ],
            [
                'id'    => 31,
                'title' => 'category_delete',
            ],
            [
                'id'    => 32,
                'title' => 'category_access',
            ],
            [
                'id'    => 33,
                'title' => 'student_create',
            ],
            [
                'id'    => 34,
                'title' => 'student_edit',
            ],
            [
                'id'    => 35,
                'title' => 'student_show',
            ],
            [
                'id'    => 36,
                'title' => 'student_delete',
            ],
            [
                'id'    => 37,
                'title' => 'student_access',
            ],
            [
                'id'    => 38,
                'title' => 'shelf_create',
            ],
            [
                'id'    => 39,
                'title' => 'shelf_edit',
            ],
            [
                'id'    => 40,
                'title' => 'shelf_show',
            ],
            [
                'id'    => 41,
                'title' => 'shelf_delete',
            ],
            [
                'id'    => 42,
                'title' => 'shelf_access',
            ],
            [
                'id'    => 43,
                'title' => 'borrower_create',
            ],
            [
                'id'    => 44,
                'title' => 'borrower_edit',
            ],
            [
                'id'    => 45,
                'title' => 'borrower_show',
            ],
            [
                'id'    => 46,
                'title' => 'borrower_delete',
            ],
            [
                'id'    => 47,
                'title' => 'borrower_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
