<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TwitterModel
 *
 * @property int $id
 * @property string $oauth_token
 * @property string $oauth_token_secret
 * @property string $userid
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TwitterModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TwitterModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TwitterModel whereOauthToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TwitterModel whereOauthTokenSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TwitterModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TwitterModel whereUserid($value)
 * @mixin \Eloquent
 */
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
