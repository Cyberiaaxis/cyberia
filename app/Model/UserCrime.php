<?php

namespace  App\Model;

use Illuminate\Database\Eloquent\Model;

class UserCrime extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'crime_id', 'success', 'fail'
    ];

    public $timestamps = false;
    // public $incrementing = false;
    // protected $primaryKey = ['user_id', 'crime_id'];
    /**
     * Display the specified resource.
     *
     * @param  \App\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function addCrime($user, $statusKey){
        return $this->updateOrCreate($user)->increment($statusKey);
    }

}
