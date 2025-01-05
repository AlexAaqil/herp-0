<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_name',
        'code',
    ];

    public function classSections()
    {
        return $this->belongsToMany(ClassSections::class, 'section_subject_teacher')->withPivot('teacher_id')->withTimestamps();
    }

    public function sectionSubjectTeachers()
    {
        return $this->hasMany(SectionSubjectTeacher::class);
    }
}
