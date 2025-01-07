<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Leaveouts extends Model
{
    use HasFactory;

    const CATEGORIES = [
        'sick',
        'casual',
        'emergency',
        'study',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($disciplinary) {
            $disciplinary->created_by = Auth::id();
        });

        static::updating(function ($disciplinary) {
            $disciplinary->updated_by = Auth::id();
        });
    }

    protected $fillable = [
        'category',
        'reason',
        'from_date',
        'to_date',
        'student_id',
        'created_by',
        'updated_by',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
