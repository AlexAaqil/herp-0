<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultSettings = [
            ['key' => 'school_acronym', 'value' => 'HSMS', 'type' => 'text'],
            ['key' => 'school_name', 'value' => 'High School Management System', 'type' => 'text'],
            ['key' => 'school_slogan', 'value' => 'Learn, Grow, Achieve', 'type' => 'text'],
            ['key' => 'school_email', 'value' => 'info@hsms.com', 'type' => 'email'],
            ['key' => 'school_phone_main', 'value' => '0746 055 487', 'type' => 'text'],
            ['key' => 'school_phone_other', 'value' => '', 'type' => 'text'],
            ['key' => 'whatsapp_number', 'value' => '', 'type' => 'text'],
            ['key' => 'school_address', 'value' => 'Ruii, Kiambu', 'type' => 'text'],
            ['key' => 'school_logo', 'value' => '', 'type' => 'file'],
        ];
    
        foreach ($defaultSettings as $setting) {
            Settings::firstOrCreate([
                'key' => $setting['key']
            ], [
                'value' => $setting['value'],
                'type' => $setting['type']
            ]);
        }
    }
}
