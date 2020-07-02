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
    public function decrementNerve($userId, $userNerve)
    {
        return $this->where('user_id', $userId)->decrement('nerve', $userNerve);
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

}

