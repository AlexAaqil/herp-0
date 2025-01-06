<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'exam_id',
        'subject_id',
        'marks',
        'grade',
    ];

    public function student()
    {
        return $this->belongsTo(Students::class);
    }

    /**
     * Get the exam associated with the exam result.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    /**
     * Get the subject associated with the exam result.
     */
    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }

    /**
     * Get the grade for the exam result.
     */
    public function grade()
    {
        return $this->belongsTo(Grades::class, 'grade', 'grade');
    }

    public static function determineGrade(int $marks): ?string
    {
        $grade = Grades::where('min_marks', '<=', $marks)
                      ->where('max_marks', '>=', $marks)
                      ->first();

        return $grade ? $grade->grade : null;
    }
}
