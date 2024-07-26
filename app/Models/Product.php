<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    // belongsTo category table
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // hasMany relation with variant table
    public function variant()
    {
        return $this->hasMany(Variant::class);
    }

    // hasMany relation with review table
    public function review()
    {
        return $this->hasMany(Review::class);
    }

    // hasMany relation with wishlist table
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}
