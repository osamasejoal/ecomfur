<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Ensure 'validity' is cast as a datetime
    protected $casts = [
        'validity' => 'datetime'
    ];

    // belongsTo order table
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
