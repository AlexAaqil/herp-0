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
        return $this->belongsToMany(Subjects::class, 'section_subject_teacher')->withPivot('teacher_id')->withTimestamps();
    }

    public function sectionSubjectTeachers()
    {
        return $this->hasMany(SectionSubjectTeacher::class);
    }
}
