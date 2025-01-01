<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Textbooks extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($textbook) {
            $textbook->issued_by = Auth::id();
        });

        static::updating(function ($textbook) {
            $textbook->received_by = Auth::id();
        });
    }

    const STATUSES = [
        'issued', 
        'returned', 
        'lost',
    ];

    protected $fillable = [
        'student_id',
        'book_number',
        'book_name',
        'date_issued',
        'status',
        'date_returned',
        'issued_by',
        'received_by',
    ];

    public function student()
    {
        return $this->belongsTo(Students::class,'student_id', 'id');
    }

    public function issuedBy()
    {
        return $this->belongsTo(User::class, 'issued_by', 'id');
    }

    public function receivedBy()
    {
        return $this->belongsTo(User::class, 'received_by', 'id');
    }
}
