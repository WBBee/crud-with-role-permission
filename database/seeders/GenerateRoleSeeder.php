<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenerateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Role::getRoleList() as $key => $value) {
            if (!ROle::isRoleExist($value)) {
                Role::create(['name' => $value]);
            }
        }
    }
}
