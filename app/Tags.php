<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    protected $fillable = [
        'name'
    ];

    public function bounty()
    {
        return $this->belongsToMany('App\Bounty', 'tags_bounty');
    }
}
