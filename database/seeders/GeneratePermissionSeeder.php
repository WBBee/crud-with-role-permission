<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneratePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Permission::getPermissionList() as $key => $value) {
            if (!Permission::isPermissionExist($value)) {
                Permission::create(['name' => $value]);
            }
        }
    }
}
