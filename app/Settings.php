<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Settings
 *
 * @property int $id
 * @property string|null $twitter_template
 * @property string|null $facebook_template
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings whereFacebookTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings whereTwitterTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Settings whereUserId($value)
 * @mixin \Eloquent
 */
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
