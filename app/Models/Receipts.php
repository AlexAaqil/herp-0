<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipts extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_record_id',
        'amount_paid',
        'balance',
    ];

    public function paymentRecord()
    {
        return $this->belongsTo(PaymentRecords::class);
    }
}
