<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SettingsSeeder::class);
        $this->call(UserLevelsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ClassesSeeder::class);
        $this->call(ClassSectionsSeeder::class);
        $this->call(GradesSeeder::class);
        $this->call(SubjectsSeeder::class);
        $this->call(ParentsSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(ParentStudentSeeder::class);
        $this->call(ExamsSeeder::class);
        $this->call(PaymentsSeeder::class);
        $this->call(InventoryCategoriesSeeder::class);
        $this->call(InventoryItemsSeeder::class);
        $this->call(TimeslotsSeeder::class);
    }
}
