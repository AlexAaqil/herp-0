<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'term',
    ];

    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }
}
