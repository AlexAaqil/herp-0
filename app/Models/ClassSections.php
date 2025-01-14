<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSections extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function subjects()
    {
        return $this->belongsToMany(Subjects::class, 'section_subject_teacher', 'class_section_id', 'subject_id')->withPivot('teacher_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class, 'subject_id', 'id');
    }

    public function sectionSubjectTeachers()
    {
        return $this->hasMany(SectionSubjectTeacher::class);
    }
}
