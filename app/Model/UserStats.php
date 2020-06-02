<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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

}

