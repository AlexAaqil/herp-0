<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function index()
    {
        return view("admin.settings.index");
    }

    private function setDefaultSettings()
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

    public function general()
    {
        $settings = Settings::allSettings();

        // If no settings, set the defaults
        if ($settings->isEmpty()) {
            $this->setDefaultSettings();
            $settings = Settings::allSettings();
        }

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'school_acronym' => 'required|string|max:40',
            'school_name' => 'required|string|max:120',
            'school_slogan' => 'required|string|max:255',
            'school_email' => 'required|email',
            'school_phone_main' => 'required|string|max:30',
            'school_phone_other' => 'nullable|string|max:30',
            'whatsapp_number' => 'nullable|string|max:30',
            'school_address' => 'required|string|max:255',
            'school_logo' => 'nullable|file|image|max:1024',
        ]);
    
        // Loop through and update settings
        foreach ($validated as $key => $value) {
            // Handle file upload separately
            if ($key === 'school_logo' && $request->hasFile('school_logo')) {
                // Fetch the current logo path from settings
                $currentLogo = Settings::getSettingValue('school_logo');
                
                // Create a new filename school name and date
                $schoolName = str_replace(' ', '_', strtolower($request->input('school_name'))).'_logo';
                $date = now()->format('dmy');
                $fileName = "{$schoolName}_{$date}.{$request->file('school_logo')->extension()}";

                // Store the new file in storage/app/public/logos
                $filePath = $request->file('school_logo')->storeAs('logos', $fileName, 'public');

                // Delete the previous logo if it exists
                if ($currentLogo && \Storage::disk('public')->exists($currentLogo)) {
                    \Storage::disk('public')->delete($currentLogo);
                }

                // Update the logo file path in the database
                Settings::updateSetting($key, $filePath);
            } else {
                Settings::updateSetting($key, $value);
            }
        }
    
        return redirect()->back()->with('success', ['message' => 'Settings updated successfully!']);
    }
}
