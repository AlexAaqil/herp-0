<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRecords extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'student_id',
        'reference_number',
        'amount_paid',
        'balance',
        'paid',
    ];

    public function receipts()
    {
        return $this->hasMany(Receipts::class, 'payment_record_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payments::class);
    }
}
