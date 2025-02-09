<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionSubjectTeacher extends Model
{
    use HasFactory;

    protected $table = 'section_subject_teacher';

    protected $fillable = [
        'class_section_id',
        'subject_id',
        'teacher_id',
        'timeslot_id',
    ];

    public function classSection()
    {
        return $this->belongsTo(ClassSections::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class, 'subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function timeslot()
    {
        return $this->belongsTo(Timeslots::class);
    }
}
