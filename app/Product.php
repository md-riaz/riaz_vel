<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['product_name', 'category_id', 'product_price', 'product_thumbnail_photo', 'product_quantity', 'product_short_description', 'product_long_description'];

    public function relationtocategory()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
