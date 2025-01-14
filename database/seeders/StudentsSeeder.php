<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Hash;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make("st123456");
        $gender = 'M';

        $students = [
            ['registration_number' => 7364, 'first_name' => 'Brian', 'last_name' => 'Kamau', 'class_section_id' => 1, 'year_admitted' => 2013, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7365, 'first_name' => 'James', 'last_name' => 'Mwangi', 'class_section_id' => 2, 'year_admitted' => 2014, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7366, 'first_name' => 'Kevin', 'last_name' => 'Odhiambo', 'class_section_id' => 3, 'year_admitted' => 2015, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7367, 'first_name' => 'Samuel', 'last_name' => 'Otieno', 'class_section_id' => 4, 'year_admitted' => 2016, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7368, 'first_name' => 'Joseph', 'last_name' => 'Ochieng', 'class_section_id' => 5, 'year_admitted' => 2013, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7369, 'first_name' => 'Peter', 'last_name' => 'Njoroge', 'class_section_id' => 1, 'year_admitted' => 2014, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7370, 'first_name' => 'Stephen', 'last_name' => 'Kipchirchir', 'class_section_id' => 2, 'year_admitted' => 2015, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7371, 'first_name' => 'Michael', 'last_name' => 'Njenga', 'class_section_id' => 3, 'year_admitted' => 2016, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7372, 'first_name' => 'Victor', 'last_name' => 'Ndungu', 'class_section_id' => 4, 'year_admitted' => 2013, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7373, 'first_name' => 'Daniel', 'last_name' => 'Mutua', 'class_section_id' => 5, 'year_admitted' => 2014, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7374, 'first_name' => 'Charles', 'last_name' => 'Karani', 'class_section_id' => 1, 'year_admitted' => 2015, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7375, 'first_name' => 'Patrick', 'last_name' => 'Kibet', 'class_section_id' => 2, 'year_admitted' => 2016, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7376, 'first_name' => 'Francis', 'last_name' => 'Nyaga', 'class_section_id' => 3, 'year_admitted' => 2013, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7377, 'first_name' => 'George', 'last_name' => 'Mutiso', 'class_section_id' => 4, 'year_admitted' => 2014, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7378, 'first_name' => 'Anthony', 'last_name' => 'Chege', 'class_section_id' => 5, 'year_admitted' => 2015, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7379, 'first_name' => 'Collins', 'last_name' => 'Koech', 'class_section_id' => 1, 'year_admitted' => 2016, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7380, 'first_name' => 'Elias', 'last_name' => 'Muriuki', 'class_section_id' => 2, 'year_admitted' => 2013, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7381, 'first_name' => 'Emmanuel', 'last_name' => 'Gatimu', 'class_section_id' => 3, 'year_admitted' => 2014, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7382, 'first_name' => 'Alfred', 'last_name' => 'Mwema', 'class_section_id' => 4, 'year_admitted' => 2015, 'gender' => $gender, 'password' => $password],
            ['registration_number' => 7383, 'first_name' => 'Tom', 'last_name' => 'Kariuki', 'class_section_id' => 5, 'year_admitted' => 2016, 'gender' => $gender, 'password' => $password],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
