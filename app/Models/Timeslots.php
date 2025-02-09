<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Timeslots extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'start_time',
        'end_time',
    ];

    public function getTimeAttribute()
    {
        $startTime = Carbon::parse($this->start_time);
        $endTime = Carbon::parse($this->end_time);

        return $startTime->format('H:i') . ' - ' . $endTime->format('H:i');
    }

    public function sectionSubjectTeachers()
    {
        return $this->hasMany(SectionSubjectTeacher::class);
    }
}
