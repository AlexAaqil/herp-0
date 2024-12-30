<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassSections;

class ClassSectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $class_sections = [
            [
                'title' => '1 South',
                'class_id' => 1,
                'teacher_id' => 1,
            ],
            [
                'title' => '1 North',
                'class_id' => 1,
                'teacher_id' => 2,
            ],
            [
                'title' => '1 West',
                'class_id' => 1,
                'teacher_id' => 3,
            ],
            [
                'title' => '1 East',
                'class_id' => 1,
            ],
            [
                'title' => '2 North',
                'class_id' => 2,
            ],
            [
                'title' => '2 South',
                'class_id' => 2,
            ],
            [
                'title' => '2 East',
                'class_id' => 2,
            ],
            [
                'title' => '2 West',
                'class_id' => 2,
            ],
            [
                'title' => '3 North',
                'class_id' => 3,
            ],
            [
                'title' => '3 South',
                'class_id' => 3,
            ],
            [
                'title' => '3 East',
                'class_id' => 3,
            ],
            [
                'title' => '3 West',
                'class_id' => 3,
            ],
            [
                'title' => '4 South',
                'class_id' => 4,
            ],
            [
                'title' => '4 North',
                'class_id' => 4,
            ],
            [
                'title' => '4 East',
                'class_id' => 4,
            ],
            [
                'title' => '4 West',
                'class_id' => 4,
            ],
        ];

        foreach($class_sections as $class_section) {
            ClassSections::create($class_section);
        }
    }
}
