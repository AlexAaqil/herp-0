<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_main',
        'emp_code',
        'password',
        'user_level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function userLevel()
    {
        return $this->belongsTo(UserLevel::class, 'user_level', 'user_level');
    }

    public function sectionsAndSubjects()
    {
        return $this->belongsToMany(ClassSections::class, 'section_subject_teacher', 'teacher_id', 'class_section_id')->withPivot('subject_id')->withTimestamps();
    }

    public function sectionSubjectTeachers()
    {
        return $this->hasMany(SectionSubjectTeacher::class);
    }
}
