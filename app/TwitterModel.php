<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterModel extends Model
{
    protected $table = 'users_twitter';
    protected $fillable = [
        'oauth_token', 'oauth_token_secret', 'userid'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
