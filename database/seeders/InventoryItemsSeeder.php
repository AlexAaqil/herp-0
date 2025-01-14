<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InventoryItem;

class InventoryItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Squared Exercise Book',
                'category_id' => '2',
                'unit' => 'pcs',
            ],
            [
                'title' => 'Ruled Exercise Book',
                'category_id' => '2',
                'unit' => 'pcs',
            ],
            [
                'title' => 'KCSE Made Familiar Maths',
                'category_id' => '1',
                'unit' => 'pcs',
            ],
            [
                'title' => 'KCSE Made Familiar English',
                'category_id' => '1',
                'unit' => 'pcs',
            ],
            [
                'title' => 'Maize seeds',
                'category_id' => '3',
                'unit' => 'bags',
            ],
            [
                'title' => 'Maize flour',
                'category_id' => '3',
                'unit' => 'kgs',
            ],
            [
                'title' => 'Cooking Oil',
                'category_id' => '3',
                'unit' => 'liters',
            ],
        ];

        foreach ($items as $item) {
            InventoryItem::create($item);
        }
    }
}
