<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder {
    public static function generateToken() {
        return bin2hex(random_bytes(16)); //generates a crypto-secure 32 characters long
        // return md5(uniqid(mt_rand(), TRUE)); //generates a crypto-secure 32 characters long
    }

    public function run() {
        DB::table('users')->insert([
            array(
                'name' => 'GOPL',
                'phone' => '9415058209',
                'email' => 'gopl@gmail.com',
                'password' => Hash::make('admin'),
                'default_password' => 'admin',
                'role' => 'GOPL',
                'api_token' => self::generateToken(),
                'login_status' => 0,
                'status' => 1,
                'profileImage' => null,
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ),
            array(
                'name' => 'Biocrux',
                'phone' => '9415058210',
                'email' => 'biocrux@gmail.com',
                'password' => Hash::make('biocrux'),
                'default_password' => 'biocrux',
                'role' => 'Biocrux',
                'api_token' => self::generateToken(),
                'login_status' => 0,
                'status' => 1,
                'profileImage' => null,
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ),
        ]);
    }
}
