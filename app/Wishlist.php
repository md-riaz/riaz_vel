<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['product_id', 'stock', 'ip_address'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
