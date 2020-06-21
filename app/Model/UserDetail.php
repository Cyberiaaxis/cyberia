<?php

namespace App\Model;

use App\City;
use Illuminate\Database\Eloquent\Model;
use Throwable;

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


    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function addUserDetails($userId)
    {
        return $this->create([
            'user_id' => $userId,
            'jail' => 0,
            'money' => 100,
            'hospital' => 0,
            'points' => 10,
            'rank_id' => 1,
            'level_id' => 1,
            'location_id'  => 1,

        ]);
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function decrementMoney($userId, $money)
    {
        try {
            $details = ['user_id' => $userId];
            return  $this->where($details)->decrement('money', $money);
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);

        }
    }
}
