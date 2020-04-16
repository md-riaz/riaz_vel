<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $fillable = ['blog_title', 'blog_thumbnail_photo', 'user_id', 'blog_description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
