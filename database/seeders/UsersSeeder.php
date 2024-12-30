<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "first_name" => "Alex",
                "last_name" => "Aaqil",
                "email" => "admin@gmail.com",
                "phone_main" => "0746055487",
                "password"=> Hash::make("@dmin"),
                "user_level" => 0,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Normal",
                "last_name" => "Admin",
                "email" => "user@gmail.com",
                "phone_main" => "0746055487",
                "password"=> Hash::make("p@ssword"),
                "user_level" => 1,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Accountant",
                "last_name" => "Test",
                "email" => "accountant@gmail.com",
                "phone_main" => "0746055487",
                "password"=> Hash::make("p@ssword"),
                "user_level" => 2,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Teacher",
                "last_name" => "Test",
                "email" => "teacher@gmail.com",
                "phone_main" => "0746055487",
                "password"=> Hash::make("p@ssword"),
                "user_level" => 3,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Teacher",
                "last_name" => "One",
                "email" => "teacher1@gmail.com",
                "phone_main" => "0746055487",
                "password"=> Hash::make("p@ssword"),
                "user_level" => 3,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Teacher",
                "last_name" => "Two",
                "email" => "teacher2@gmail.com",
                "phone_main" => "0746055487",
                "password"=> Hash::make("p@ssword"),
                "user_level" => 3,
                "email_verified_at" => now(),
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
