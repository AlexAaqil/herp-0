<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'unit',
        'category_id',
    ];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(InventoryCategory::class, 'category_id');
    }

    public function records()
    {
        return $this->hasMany(InventoryRecord::class, 'item_id');
    }
}
