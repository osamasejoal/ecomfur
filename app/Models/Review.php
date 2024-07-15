<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [];

    // belongsTo product table
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // belongsTo user table
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
