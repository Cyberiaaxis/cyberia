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


    public function getRouteKeyName()
    {
        return 'user_id';
    }


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
            'money' => 100,
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

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function changeTravelStatus(int $userId, int $location, string $startedAt = NULL)
    {
        try {
            return  $this->where(['user_id' => $userId])->update(['location_id' => $location, 'travel_started' => $startedAt ]);
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function getLocation(int $userId) : int
    {
        try {
            return  $this->where(['user_id' => $userId])->value('location_id');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function getLevelId(int $userId): int
    {
        try {
            return  $this->where(['user_id' => $userId])->value('level_id');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function getReaminTravelTime(int $userId)
    {
        try {
            return  $this->where(['user_id' => $userId])->value('travel_started');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function getActiveEstate(int $userId) : int
    {
        try {
            return  $this->where(['user_id' => $userId])->value('realestate');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function setActiveEstate(int $userId, int $realEstateId)
    {
        try {
            return  $this->where(['user_id' => $userId])->update(['realestate' => $realEstateId]);
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }


    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function getJailTime(int $bustingId)
    {
        try {
            return $this->where(['user_id' => $bustingId])->value('jail');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function getHospitalTime(int $userId)
    {
        try {
            return $this->where(['user_id' => $userId])->value('hospital');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function addHospitalTime(int $userId, $newHospitalTime)
    {
        try {
            return $this->where(['user_id' => $userId])->update(['hospital'=> $newHospitalTime]);
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function busted(int $busterId)
    {
        try {
            return  $this->where(['user_id' => $busterId])->update(['jail' => Null]);
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function failbuster(int $bustedId, string $datetime)
    {
        try {
            return  $this->where(['user_id' => $bustedId])->update(['jail', $datetime]);
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function getRankId(int $userId) : int
    {
        try {
            return  $this->where(['user_id' => $userId])->value('rank_id');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

}
