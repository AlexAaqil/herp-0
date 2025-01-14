<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class ParentStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            1 => [1, 2],
            2 => [3, 4],
            3 => [2, 3]
        ];

        foreach ($students as $studentId => $parentIds) {
            $student = Student::find($studentId);
            if ($student) {
                $student->parents()->attach($parentIds);
            }
        }
    }
}
