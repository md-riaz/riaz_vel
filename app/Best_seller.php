<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Best_seller extends Model
{
    protected $fillable = ['product_id', 'ordered'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
