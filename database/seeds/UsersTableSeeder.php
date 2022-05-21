<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'role' => 'admin',
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'mobile' => '123456789',
            'password' => Hash::make('123456')
        ]);

        User::insert([
            'role' => 'user',
            'name' => 'User One',
            'email' => 'urser1@gmail.com',
            'mobile' => '234567891',
            'password' => Hash::make('123456')
        ]);
    }
}
