<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['phone_number', 'email', 'address', 'facebook_url', 'twitter_url', 'linkedin_url', 'gplus_url',];
}
