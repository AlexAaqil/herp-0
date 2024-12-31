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
        $password = Hash::make('p@rents');
        $parents = [
            [
                'first_name' => 'Silvia',
                'last_name' => 'Njeri',
                'email' => 'parent@gmail.com',
                'phone_main' => '0720569458',
                'password' => $password,
            ],
            [
                'first_name' => 'Beatrice',
                'last_name' => 'Wangari',
                'email' => 'parent1@gmail.com',
                'phone_main' => '0746055487',
                'password' => $password,
            ],
            [
                'first_name' => 'Nicholas',
                'last_name' => 'Kamau',
                'email' => 'parent2@gmail.com',
                'phone_main' => '0720569457',
                'password' => $password,
            ],
            [
                'first_name' => 'Charles',
                'last_name' => 'Maina',
                'email' => 'parent3@gmail.com',
                'phone_main' => '0720569358',
                'password' => $password,
            ],
        ];

        foreach($parents as $parent) {
            Parents::create($parent);
        }
    }
}
