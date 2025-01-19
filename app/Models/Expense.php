<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    const EXPENSECATEGORIES = [
        'inventory',
        'labor',
        'salary',
        'other',
    ];

    protected $fillable = [
        'recepient',
        'category',
        'amount_paid',
        'date',
        'description',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
