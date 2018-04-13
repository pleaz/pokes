<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Bounty
 *
 * @property int $id
 * @property string $name
 * @property string|null $twitter_url
 * @property string|null $facebook_url
 * @property string|null $twitter_number
 * @property string|null $facebook_number
 * @property string|null $first_day
 * @property int|null $period
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tags[] $tags
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bounty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bounty whereFacebookNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bounty whereFacebookUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bounty whereFirstDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bounty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bounty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bounty wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bounty whereTwitterNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bounty whereTwitterUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bounty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Bounty whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Reports[] $reports
 */
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

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function reports()
    {
        return $this->hasMany('App\Reports');
    }
}
