<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    const CATEGORIES = [
        'casual',
        'emergency',
        'maternal',
        'sick',
        'study',
    ];

    protected $fillable = [
        'category',
        'reason',
        'from_date',
        'to_date',
        'user_id',
        'status',
    ];

    protected $casts = [
        'from_date' => 'datetime',
        'to_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
