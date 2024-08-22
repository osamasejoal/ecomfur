<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
         //Admin
         [
            'name' => 'Osama Sezwal',
            'email' => 'osama@mail.com',
            'phone' => '01921012255',
            'gender' => 'male',
            'password' => Hash::make('osama@mail.com'),
            'role' => 'admin',
         ],

         //Moderator
         [
            'name' => 'Harculis',
            'email' => 'harculis@mail.com',
            'phone' => '01921013321',
            'gender' => 'male',
            'password' => Hash::make('harculis@mail.com'),
            'role' => 'moderator',
         ],

         //user
         [
            'name' => 'Lathi Suit',
            'email' => 'lsuit@mail.com',
            'phone' => '01921013356',
            'gender' => 'female',
            'password' => Hash::make('lsuit@mail.com'),
            'role' => 'user',
         ],
        ]);
    }
}
