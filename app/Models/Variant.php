<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $guarded = [];

    // belongsTo product table
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // belongsTo orderItem table
    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }
}
