<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student_class()
    {
        return $this->belongsTo(ClassSections::class, 'class_section_id');
    }
}
