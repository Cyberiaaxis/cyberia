<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class UserTravel extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'location', 'travelled'
    ];

    /**
     * Display the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function addTravel(int $user, int $destination)
    {
        $data = ['user_id' => $user, 'location' => $destination];
    return $this->updateOrCreate($data)->increment('travelled');
    }
}
