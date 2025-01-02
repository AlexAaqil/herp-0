<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'reference_number',
        'payment_method',
        'amount',
        'class_id',
        'term',
        'year',
    ];

    public function myClass()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }
}
