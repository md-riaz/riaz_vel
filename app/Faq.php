<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['faq_question', 'faq_answer', 'user_id'];

    public function relationtouser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
