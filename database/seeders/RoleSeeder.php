<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'role_name' => 'administrator',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'role_name' => 'petugas',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'role_name' => 'users',
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
        ];


        foreach ($data as $value) {
            # code...
            Role::create($value);
        }
    }
}
