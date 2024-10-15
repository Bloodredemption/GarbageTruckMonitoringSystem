<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'fullname' => 'MENRO Admin',
            'username' => 'menroadmin',
            'password' => Hash::make('password'),
            'contact_num' => 639876543210,
            'user_type' => 'admin',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'fullname' => 'MENRO Driver',
            'username' => 'menrodriver',
            'password' => Hash::make('password'),
            'contact_num' => 639876543210,
            'user_type' => 'driver',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'fullname' => 'MENRO Landfill',
            'username' => 'menrolandfill',
            'password' => Hash::make('password'),
            'contact_num' => 639876543210,
            'user_type' => 'landfill',
            'status' => 'active',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
