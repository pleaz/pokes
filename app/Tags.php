<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

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
 * @mixin \Eloquent
 */
class Tags extends Model
{
    use Searchable;

    protected $table = 'tags';
    protected $fillable = [
        'name'
    ];

    public function bounty()
    {
        return $this->belongsToMany('App\Bounty', 'tags_bounty');
    }

    public function searchableAs()
    {
        return 'tags';
    }

    public function toSearchableArray()
    {
        $record = $this->toArray();

        unset($record['created_at'], $record['updated_at']);

        return $record;
    }
}
