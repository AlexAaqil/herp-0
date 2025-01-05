<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grades;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            [
                'min_marks' => 80,
                'max_marks' => 100,
                'grade' => 'A',
                'remarks' => 'Excellent',
            ],
            [
                'min_marks' => 75,
                'max_marks' => 79,
                'grade' => 'A-',
                'remarks' => 'Excellent',
            ],
            [
                'min_marks' => 70,
                'max_marks' => 74,
                'grade' => 'B+',
                'remarks' => 'Very Good',
            ],
            [
                'min_marks' => 65,
                'max_marks' => 69,
                'grade' => 'B',
                'remarks' => 'Very Good',
            ],
            [
                'min_marks' => 60,
                'max_marks' => 64,
                'grade' => 'B-',
                'remarks' => 'Very Good',
            ],
            [
                'min_marks' => 55,
                'max_marks' => 59,
                'grade' => 'C+',
                'remarks' => 'Good',
            ],
            [
                'min_marks' => 50,
                'max_marks' => 54,
                'grade' => 'C',
                'remarks' => 'Pass',
            ],
            [
                'min_marks' => 45,
                'max_marks' => 49,
                'grade' => 'C-',
                'remarks' => 'Poor',
            ],
            [
                'min_marks' => 40,
                'max_marks' => 44,
                'grade' => 'D+',
                'remarks' => 'Poor',
            ],
            [
                'min_marks' => 35,
                'max_marks' => 39,
                'grade' => 'D',
                'remarks' => 'Poor',
            ],
            [
                'min_marks' => 30,
                'max_marks' => 34,
                'grade' => 'D-',
                'remarks' => 'Poor',
            ],
            [
                'min_marks' => 0,
                'max_marks' => 29,
                'grade' => 'E',
                'remarks' => 'Fail',
            ],
        ];

        foreach($grades as $grade) {
            Grades::create($grade);
        }
    }
}
