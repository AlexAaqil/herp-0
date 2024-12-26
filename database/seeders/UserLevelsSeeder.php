<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserLevel;

class UserLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_levels = [
            [
                "user_level" => 0,
                "title" => "super_admin",
            ],
            [
                "user_level" => 1,
                "title" => "admin",
            ],
            [
                "user_level" => 2,
                "title" => "accountant",
            ],
            [
                "user_level" => 3,
                "title" => "teacher",
            ],
        ];

        foreach($user_levels as $user_level) {
            UserLevel::create($user_level);
        }
    }
}
