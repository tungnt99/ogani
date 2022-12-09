<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Thanh Tùng',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Thanhtung1999'),
            "photo" => "",
            "phone_number" => "123456789",
            "address" => "",
            "auth_type" => "email",
            "role_name" => "admin"
        ]);
    }
}
