<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InventoryCategory;

class InventoryCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'textbook',
            'exercise book',
            'food supply',
            'kitchen supply',
            'sport equipment'
        ];

        foreach ($categories as $category) {
            InventoryCategory::create([
                'title' => $category,
            ]);
        }
    }
}
