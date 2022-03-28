<?php

namespace Database\Seeders;

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
                'role' => Role::ROLE_ADMIN,
            ]
        ];

        foreach ($seed_user as $key => $value) {
            if(!User::isEmailExist($value['email'])){
                $new_user = User::create([
                    'name' => $value['name'],
                    'email' => $value['email'],
                    'password' => Hash::make($value['password']),
                ]);

                $new_user->assignRole($value['role']);
            }
        }
    }
}
