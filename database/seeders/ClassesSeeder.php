<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classes;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $class_names = [
            'Form 1',
            'Form 2',
            'Form 3',
            'Form 4',
        ];

        foreach($class_names as $class_name) {
            Classes::create([
                'class_name' => $class_name,
            ]);
        }
    }
}
