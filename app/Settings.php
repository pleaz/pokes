<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'users_templates';
    protected $fillable = [
        'twitter_template', 'facebook_template'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
