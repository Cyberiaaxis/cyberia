<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class Country extends Model
{

    public function crimes()
    {
        return $this->hasMany(Crime::class);
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function getCountryById($id)
    {
        try {
            return $this->find($id);
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }
}
