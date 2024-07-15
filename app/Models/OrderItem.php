<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    // belongsTo order table
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // hasOne relation with variant table
    public function variant()
    {
        return $this->hasOne(Variant::class);
    }
}
