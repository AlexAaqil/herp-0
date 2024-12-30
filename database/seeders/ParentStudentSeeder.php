<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Students;
use App\Models\Parents;

class ParentStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = Students::find(1);
        $student->parents()->attach([1, 2]); // Student 1 has Parent 1 and 2
        
        $parent = Parents::find(1);
        $parent->students()->attach([1, 3]); // Parent 1 has Student 1 and 3
    }
}
