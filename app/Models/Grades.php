<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;

    protected $fillable = [
        'min_marks',
        'max_marks',
        'grade',
        'remarks',
    ];

    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }
}
