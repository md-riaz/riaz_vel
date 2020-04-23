<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_list extends Model
{
    protected $fillable = ['order_id', 'user_id', 'product_id', 'quantity'];
}
