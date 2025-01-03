<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_main',
        'phone_other',
        'address',
        'password',
    ]; 

    public function students()
    {
        return $this->belongsToMany(Students::class, 'parent_student',  'parent_id', 'student_id');
    } 
    
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
