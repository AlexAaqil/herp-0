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
        $user_password = Hash::make("p@ssword");

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
                "password"=> $user_password,
                "user_level" => 1,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Accountant",
                "last_name" => "Test",
                "email" => "accountant@gmail.com",
                "phone_main" => "0746055487",
                "password"=> $user_password,
                "user_level" => 2,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Teacher",
                "last_name" => "Test",
                "email" => "teacher@gmail.com",
                "phone_main" => "0746055487",
                "password"=> $user_password,
                "user_level" => 3,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Teacher",
                "last_name" => "One",
                "email" => "teacher1@gmail.com",
                "phone_main" => "0746055487",
                "password"=> $user_password,
                "user_level" => 3,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Teacher",
                "last_name" => "Two",
                "email" => "teacher2@gmail.com",
                "phone_main" => "0746055487",
                "password"=> $user_password,
                "user_level" => 3,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Store",
                "last_name" => "Keeper",
                "email" => "storekeeper@gmail.com",
                "phone_main" => "0746055487",
                "password"=> $user_password,
                "user_level" => 4,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Peter",
                "last_name" => "Kamau",
                "email" => "peter.kamau@gmail.com",
                "phone_main" => "0712345678",
                "password"=> $user_password,
                "user_level" => 2,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "John",
                "last_name" => "Odhiambo",
                "email" => "john.odhiambo@gmail.com",
                "phone_main" => "0723456789",
                "password"=> $user_password,
                "user_level" => 4,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Samuel",
                "last_name" => "Ochieng",
                "email" => "samuel.ochieng@gmail.com",
                "phone_main" => "0734567890",
                "password"=> $user_password,
                "user_level" => 3,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "James",
                "last_name" => "Mwangi",
                "email" => "james.mwangi@gmail.com",
                "phone_main" => "0745678901",
                "password"=> Hash::make("@dmin"),
                "user_level" => 1,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Kevin",
                "last_name" => "Njoroge",
                "email" => "kevin.njoroge@gmail.com",
                "phone_main" => "0711223344",
                "password"=> $user_password,
                "user_level" => 4,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Francis",
                "last_name" => "Mutua",
                "email" => "francis.mutua@gmail.com",
                "phone_main" => "0722334455",
                "password"=> $user_password,
                "user_level" => 2,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Anthony",
                "last_name" => "Kiprono",
                "email" => "anthony.kiprono@gmail.com",
                "phone_main" => "0733445566",
                "password"=> $user_password,
                "user_level" => 3,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Stephen",
                "last_name" => "Wanjiru",
                "email" => "stephen.wanjiru@gmail.com",
                "phone_main" => "0744556677",
                "password"=> $user_password,
                "user_level" => 4,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Joseph",
                "last_name" => "Karanja",
                "email" => "joseph.karanja@gmail.com",
                "phone_main" => "0715667788",
                "password"=> Hash::make("@dmin"),
                "user_level" => 1,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Collins",
                "last_name" => "Omondi",
                "email" => "collins.omondi@gmail.com",
                "phone_main" => "0726778899",
                "password"=> $user_password,
                "user_level" => 3,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "George",
                "last_name" => "Ndungu",
                "email" => "george.ndungu@gmail.com",
                "phone_main" => "0737889900",
                "password"=> $user_password,
                "user_level" => 4,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Charles",
                "last_name" => "Chege",
                "email" => "charles.chege@gmail.com",
                "phone_main" => "0748990011",
                "password"=> $user_password,
                "user_level" => 2,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Martin",
                "last_name" => "Otieno",
                "email" => "martin.otieno@gmail.com",
                "phone_main" => "0719001122",
                "password"=> $user_password,
                "user_level" => 4,
                "email_verified_at" => now(),
            ],
            [
                "first_name" => "Vincent",
                "last_name" => "Gitau",
                "email" => "vincent.gitau@gmail.com",
                "phone_main" => "0720112233",
                "password"=> $user_password,
                "user_level" => 3,
                "email_verified_at" => now(),
            ],
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
