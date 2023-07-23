<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'uuid'      => \Str::uuid(),
            'first_name' => "Admin",
            'last_name' => "Admin",
            'fullname' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('masuk123'),
            'remember_token' => \Str::random(10),
            'roles' => 'adminstrator',
        ];

        User::create($data);
    }
}
