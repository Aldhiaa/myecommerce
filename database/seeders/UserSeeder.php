<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],
            // vender
           
         // user
            [
                'name' => 'zaid askar',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => hash::make('111'),
                'role' => 'user',
                'status' => 'active',
            ]
            ]);
    }
}
