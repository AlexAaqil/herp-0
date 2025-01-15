<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id', 
        'class_section_id', 
        'subject_id', 
        'date_issued', 
        'deadline', 
        'description', 
        'uploaded_assignment',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function classSection()
    {
        return $this->belongsTo(ClassSections::class, 'class_section_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }
}
