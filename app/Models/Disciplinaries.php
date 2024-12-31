<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Disciplinaries extends Model
{
    use HasFactory;

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
        'comment',
        'student_id',
        'created_by',
        'updated_by',
    ];

    public function student()
    {
        return $this->belongsTo(Students::class,'student_id');
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
