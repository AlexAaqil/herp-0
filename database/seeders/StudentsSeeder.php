<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Students;
use Hash;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make("st123456");

        $students = [
            [
                'registration_number' => 7364,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'class_section_id' => 1,
                'year_admitted' => 2013,
                'gender' => 'M',
                'password' => $password,
            ],
            [
                'registration_number' => 7365,
                'first_name' => 'David',
                'last_name' => 'Luis',
                'class_section_id' => 5,
                'year_admitted' => 2013,
                'gender' => 'M',
                'password' => $password,
            ],
            [
                'registration_number' => 7366,
                'first_name' => 'Luke',
                'last_name' => 'Belmar',
                'class_section_id' => 3,
                'year_admitted' => 2013,
                'gender' => 'M',
                'password' => $password,
            ],
        ];

        foreach($students as $student) {
            Students::create($student);
        }
    }
}
