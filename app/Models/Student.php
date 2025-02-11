<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function studentClassSection()
    {
        return $this->belongsTo(ClassSections::class, 'class_section_id');
    }

    public function dorm()
    {
        return $this->belongsTo(Dorm::class, 'student_id');
    }

    public function parents()
    {
        return $this->belongsToMany(Parents::class, 'parent_student', 'student_id', 'parent_id');
    }

    public function getParentNamesAttribute()
    {
        if ($this->parents->isEmpty()) {
            return 'Unknown';
        }

        // Join parent names with a comma
        return $this->parents->pluck('full_name')->join(', ');
    }

    public function examResults()
    {
        return $this->hasMany(ExamResult::class, 'student_id');
    }

    public function textbooks()
    {
        return $this->hasMany(Textbooks::class, 'student_id');
    }

    public function leaveouts()
    {
        return $this->hasMany(Leaveouts::class, 'student_id');
    }

    public function disciplinaries()
    {
        return $this->hasMany(Disciplinaries::class, 'student_id');
    }

    public function paymentRecords()
    {
        return $this->hasMany(PaymentRecords::class, 'student_id');
    }
}
