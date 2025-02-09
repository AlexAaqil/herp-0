<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Timeslots;

class TimeslotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timeslots = [
            [
                'day' => 'Monday',
                'start_time' => '08:00:00',
                'end_time' => '08:40:00',
            ],
            [
                'day' => 'Monday',
                'start_time' => '08:40:00',
                'end_time' => '09:20:00',
            ],
            [
                'day' => 'Monday',
                'start_time' => '09:20:00',
                'end_time' => '10:00:00',
            ],
            [
                'day' => 'Monday',
                'start_time' => '10:40:00',
                'end_time' => '11:20:00',
            ],
            [
                'day' => 'Monday',
                'start_time' => '11:20:00',
                'end_time' => '12:00:00',
            ],
            [
                'day' => 'Monday',
                'start_time' => '12:00:00',
                'end_time' => '12:40:00',
            ],
            [
                'day' => 'Monday',
                'start_time' => '12:00:00',
                'end_time' => '12:40:00',
            ],
            [
                'day' => 'Monday',
                'start_time' => '13:40:00',
                'end_time' => '14:20:00',
            ],
            [
                'day' => 'Monday',
                'start_time' => '14:20:00',
                'end_time' => '15:00:00',
            ],
            [
                'day' => 'Monday',
                'start_time' => '15:00:00',
                'end_time' => '15:40:00',
            ],
            [
                'day' => 'Monday',
                'start_time' => '15:40:00',
                'end_time' => '16:20:00',
            ],



            [
                'day' => 'Tuesday',
                'start_time' => '08:00:00',
                'end_time' => '08:40:00',
            ],
            [
                'day' => 'Tuesday',
                'start_time' => '08:40:00',
                'end_time' => '09:20:00',
            ],
            [
                'day' => 'Tuesday',
                'start_time' => '09:20:00',
                'end_time' => '10:00:00',
            ],
            [
                'day' => 'Tuesday',
                'start_time' => '10:40:00',
                'end_time' => '11:20:00',
            ],
            [
                'day' => 'Tuesday',
                'start_time' => '11:20:00',
                'end_time' => '12:00:00',
            ],
            [
                'day' => 'Tuesday',
                'start_time' => '12:00:00',
                'end_time' => '12:40:00',
            ],
            [
                'day' => 'Tuesday',
                'start_time' => '12:00:00',
                'end_time' => '12:40:00',
            ],
            [
                'day' => 'Tuesday',
                'start_time' => '13:40:00',
                'end_time' => '14:20:00',
            ],
            [
                'day' => 'Tuesday',
                'start_time' => '14:20:00',
                'end_time' => '15:00:00',
            ],
            [
                'day' => 'Tuesday',
                'start_time' => '15:00:00',
                'end_time' => '15:40:00',
            ],
            [
                'day' => 'Tuesday',
                'start_time' => '15:40:00',
                'end_time' => '16:20:00',
            ],



            [
                'day' => 'Wednesday',
                'start_time' => '08:00:00',
                'end_time' => '08:40:00',
            ],
            [
                'day' => 'Wednesday',
                'start_time' => '08:40:00',
                'end_time' => '09:20:00',
            ],
            [
                'day' => 'Wednesday',
                'start_time' => '09:20:00',
                'end_time' => '10:00:00',
            ],
            [
                'day' => 'Wednesday',
                'start_time' => '10:40:00',
                'end_time' => '11:20:00',
            ],
            [
                'day' => 'Wednesday',
                'start_time' => '11:20:00',
                'end_time' => '12:00:00',
            ],
            [
                'day' => 'Wednesday',
                'start_time' => '12:00:00',
                'end_time' => '12:40:00',
            ],
            [
                'day' => 'Wednesday',
                'start_time' => '12:00:00',
                'end_time' => '12:40:00',
            ],
            [
                'day' => 'Wednesday',
                'start_time' => '13:40:00',
                'end_time' => '14:20:00',
            ],
            [
                'day' => 'Wednesday',
                'start_time' => '14:20:00',
                'end_time' => '15:00:00',
            ],
            [
                'day' => 'Wednesday',
                'start_time' => '15:00:00',
                'end_time' => '15:40:00',
            ],
            [
                'day' => 'Wednesday',
                'start_time' => '15:40:00',
                'end_time' => '16:20:00',
            ],



            [
                'day' => 'Thursday',
                'start_time' => '08:00:00',
                'end_time' => '08:40:00',
            ],
            [
                'day' => 'Thursday',
                'start_time' => '08:40:00',
                'end_time' => '09:20:00',
            ],
            [
                'day' => 'Thursday',
                'start_time' => '09:20:00',
                'end_time' => '10:00:00',
            ],
            [
                'day' => 'Thursday',
                'start_time' => '10:40:00',
                'end_time' => '11:20:00',
            ],
            [
                'day' => 'Thursday',
                'start_time' => '11:20:00',
                'end_time' => '12:00:00',
            ],
            [
                'day' => 'Thursday',
                'start_time' => '12:00:00',
                'end_time' => '12:40:00',
            ],
            [
                'day' => 'Thursday',
                'start_time' => '12:00:00',
                'end_time' => '12:40:00',
            ],
            [
                'day' => 'Thursday',
                'start_time' => '13:40:00',
                'end_time' => '14:20:00',
            ],
            [
                'day' => 'Thursday',
                'start_time' => '14:20:00',
                'end_time' => '15:00:00',
            ],
            [
                'day' => 'Thursday',
                'start_time' => '15:00:00',
                'end_time' => '15:40:00',
            ],
            [
                'day' => 'Thursday',
                'start_time' => '15:40:00',
                'end_time' => '16:20:00',
            ],



            [
                'day' => 'Friday',
                'start_time' => '08:00:00',
                'end_time' => '08:40:00',
            ],
            [
                'day' => 'Friday',
                'start_time' => '08:40:00',
                'end_time' => '09:20:00',
            ],
            [
                'day' => 'Friday',
                'start_time' => '09:20:00',
                'end_time' => '10:00:00',
            ],
            [
                'day' => 'Friday',
                'start_time' => '10:40:00',
                'end_time' => '11:20:00',
            ],
            [
                'day' => 'Friday',
                'start_time' => '11:20:00',
                'end_time' => '12:00:00',
            ],
            [
                'day' => 'Friday',
                'start_time' => '12:00:00',
                'end_time' => '12:40:00',
            ],
            [
                'day' => 'Friday',
                'start_time' => '12:00:00',
                'end_time' => '12:40:00',
            ],
            [
                'day' => 'Friday',
                'start_time' => '13:40:00',
                'end_time' => '14:20:00',
            ],
            [
                'day' => 'Friday',
                'start_time' => '14:20:00',
                'end_time' => '15:00:00',
            ],
            [
                'day' => 'Friday',
                'start_time' => '15:00:00',
                'end_time' => '15:40:00',
            ],
            [
                'day' => 'Friday',
                'start_time' => '15:40:00',
                'end_time' => '16:20:00',
            ],
        ];

        foreach($timeslots as $timeslot) {
            Timeslots::create($timeslot);
        }
    }
}
