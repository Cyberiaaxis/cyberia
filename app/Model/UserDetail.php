<?php

namespace App\Model;

use App\City;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'hospital', 'jail'
    ];

    public function location()
    {
        return $this->belongsTo(City::class, 'location_id');
    }

    /**
     * get Location Name
     */
    public function getCurrentLocationAttribute()
    {
        return $this->location()->value('name');
    }

    public function rank()
    {

        return $this->belongsTo(Rank::class);
    }

    public function level()
    {

        return $this->belongsTo(Level::class);
    }
}
