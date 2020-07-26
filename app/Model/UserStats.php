<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class UserStats extends Model
{
  public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'strength', 'defense', 'agility', 'endurance',  'hp', 'max_hp', 'energy', 'max_energy', 'max_nerve', 'will', 'max_will'
    ];
    /**
     * Create a new userstats instance after a valid registration.
     *
     * @param  $userId
     * @return \App\User
     */
    public function addUserStats($userId)
    {
        return $this->create([
            'user_id' => $userId,
            'strength' => 100,
            'defense' => 100,
            'agility' => 100,
            'endurance' => 100,
            'hp' => 100,
            'max_hp' => 100,
            'energy' => 10,
            'max_energy' => 10,
            'nerve' => 10,
            'max_nerve' => 10,
            'will' => 100,
            'max_will' => 100,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function decrementNerve(int $userId, int $userNerve)
    {
        return $this->where('user_id', $userId)->decrement('nerve', $userNerve);
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function decrementBustExperince(int $userId, $bustExperience)
    {
        try {
            return  $this->where(['user_id' => $userId])->decrement(['bust_experience', $bustExperience]);
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
    public function incrementBustExperince(int $userId, string $bustExperience)
    {
        try {
            return  $this->where(['user_id' => $userId])->increment(['bust_experience', $bustExperience]);
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeWill($userId, $will)
    {
        return $this->where('user_id', $userId)->update(['max_will'=> $will]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function haveNerve($userId)
    {
        return $this->where('user_id', $userId)->value('nerve');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function maxNerve($userId)
    {
        return $this->where('user_id', $userId)->value('max_nerve');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getHp($userId)
    {
        return $this->where('user_id', $userId)->value('hp');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getMaxHp($userId)
    {
        return $this->where('user_id', $userId)->value('max_hp');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEnergy($userId)
    {
        return $this->where('user_id', $userId)->value('energy');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getMaxEnergy(int $userId)
    {
        return $this->where('user_id', $userId)->value('max_energy');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDefense(int $userId)
    {
        return $this->where('user_id', $userId)->value('defense');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAgility(int $userId)
    {
        return $this->where('user_id', $userId)->value('agility');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getStrength(int $userId)
    {
        return $this->where('user_id', $userId)->value('strength');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function decrementHP(int $userId, $newHP)
    {
        return $this->where('user_id', $userId)->decrement('hp', $newHP);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function decrementEnergy(int $userId, $newEnergy)
    {
        return $this->where('user_id', $userId)->decrement('energy', $newEnergy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userStats(int $userId)
    {
        return $this->where('user_id', $userId)->first();
    }
}

