<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Parents;
use Hash;

class ParentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parents = [
            [
                'first_name' => 'Silvia',
                'last_name' => 'Njeri',
                'email' => 'parent@gmail.com',
                'phone_main' => '0720569458',
                'password' => Hash::make('p@rents'),
            ],
            [
                'first_name' => 'Beatrice',
                'last_name' => 'Wangari',
                'email' => 'parent1@gmail.com',
                'phone_main' => '0746055487',
                'password' => Hash::make('p@rents'),
            ],
            [
                'first_name' => 'Nicholas',
                'last_name' => 'Kamau',
                'email' => 'parent2@gmail.com',
                'phone_main' => '0720569457',
                'password' => Hash::make('p@rents'),
            ],
            [
                'first_name' => 'Charles',
                'last_name' => 'Maina',
                'email' => 'parent3@gmail.com',
                'phone_main' => '0720569358',
                'password' => Hash::make('p@rents'),
            ],
        ];

        foreach($parents as $parent) {
            Parents::create($parent);
        }
    }
}
