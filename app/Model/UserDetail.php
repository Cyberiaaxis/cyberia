<?php

namespace App\Model;

use App\City;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'jail', 'money',  'hospital',  'points', 'rates', 'rank_id', 'level_id', 'location_id', 'gang_id',  'active_course', 'course_started','job'
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

    public function gang()
    {
        return $this->belongsTo(Gang::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'active_course');
    }
}
