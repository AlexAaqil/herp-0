<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Exam;

class ExamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $year = now()->year;
        $terms = [1, 2, 3];

        $exams = [
            'Opener',
            'Mid Term',
            'End Term',
        ];

        foreach ($terms as $term) {
            foreach ($exams as $exam) {
                Exam::create([
                    'title' => $exam,
                    'year' => $year,
                    'term' => $term,
                ]);
            }
        }
    }
}
