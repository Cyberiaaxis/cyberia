<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class TravelRoute extends Model
{
    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function getTravelList()
    {
        try {
             return $this->all();
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
    public function getTravelRoute($origin, $destination)
    {
        try {
            return $this->where(['origin' => $origin, 'destination'=> $destination])->get('id');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }

}
