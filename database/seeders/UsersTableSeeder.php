<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create a superadmin
        User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),  // Change 'password' to a more secure one
            'role' => User::SUPERUSER
        ]);

        // Create an admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),  // Change 'password' to a more secure one
            'role' => User::ADMIN
        ]);

        // Create a regular user
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),  // Change 'password' to a more secure one
            'role' => User::USER
        ]);
    }
}
