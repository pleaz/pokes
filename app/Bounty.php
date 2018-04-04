<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bounty extends Model
{
    protected $table = 'bounty';
    protected $fillable = [
        'name', 'twitter_url', 'facebook_url', 'twitter_number', 'facebook_number', 'first_day', 'period'
    ];

    public function tags()
    {
        return $this->belongsToMany('App\Tags', 'tags_bounty');
    }
}
