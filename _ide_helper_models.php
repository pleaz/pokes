<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Tags
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Bounty[] $bounty
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tags whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tags whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tags whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tags whereUpdatedAt($value)
 */
	class Tags extends \Eloquent {}
}

namespace App{
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
 */
	class Settings extends \Eloquent {}
}

namespace App{
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
 */
	class TwitterModel extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Settings $settings
 * @property-read \App\TwitterModel $twitter
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
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
 */
	class Bounty extends \Eloquent {}
}

