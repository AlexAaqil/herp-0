<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'transaction',
        'quantity',
        'remaining',
        'date',
        'description',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function getTransactionTypeAttribute()
    {
        return $this->transaction == 1 ? 'Arrival' : 'Usage';
    }

    public function item()
    {
        return $this->belongsTo(InventoryItem::class, 'item_id');
    }
}