<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Reports
 *
 * @property int $id
 * @property string|null $date
 * @property string|null $report
 * @property int $bounty_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Bounty $bounty
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reports whereBountyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reports whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reports whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reports whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reports whereReport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Reports whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Reports extends Model
{
    protected $table = 'users_reports';
    protected $fillable = [
        'date', 'report'
    ];

    public function bounty()
    {
        return $this->belongsTo('App\Bounty');
    }
}
