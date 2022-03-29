<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GenerateAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed_user = [
            [
                'name' => 'administrator',
                'email' => 'bayu@admin.com',
                'password' => 'bayubayu',
                'guard' => array_to_object([
                    'roles' => [
                        Role::ROLE_ADMIN
                    ],
                    'permissions' => [
                        Permission::MANAGE_USERS,
                        Permission::MANAGE_ROLES,
                        Permission::MANAGE_PERMISSIONS,
                    ],
                ],)
            ]
        ];

        foreach ($seed_user as $key => $value) {
            if(!User::isEmailExist($value['email'])){
                $new_user = User::create([
                    'name' => $value['name'],
                    'email' => $value['email'],
                    'password' => Hash::make($value['password']),
                ]);

                $new_user->assignRole($value['guard']->roles);
                $new_user->syncPermissions($value['guard']->permissions);
            }
        }
    }
}
