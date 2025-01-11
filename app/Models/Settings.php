<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'key', 
        'value', 
        'type'
    ];

    public static function allSettings()
    {
        return self::all();
    }

    public static function getSettings()
    {
        return self::pluck('value', 'key')->toArray();
    }

    public static function getSettingValue($key)
    {
        return self::where('key', $key)->value('value');
    }

    public static function updateSetting($key, $value)
    {
        $setting = self::where('key', $key)->first();

        if ($setting) {
            $setting->value = $value;
            $setting->save();
        }
    }
}
