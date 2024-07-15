<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    // belongsTo user table
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // hasOne relation with coupon table
    public function coupon()
    {
        return $this->hasOne(Coupon::class);
    }

    // hasMany relation with orderItem table
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
