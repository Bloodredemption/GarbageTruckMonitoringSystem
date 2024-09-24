<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
            'fullname' => 'MENRO Admin',
            'username' => 'menroadmin',
            'password' => Hash::make('password'),  // Ensure password is hashed
            'contact_num' => 639876543210,
            'user_type' => 'admin',
            'status' => 'active',
        ]);
    }
}