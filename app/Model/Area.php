<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class Area extends Model
{
    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function getAreaById($id)
    {
        try {
            return $this->find($id);
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }    //
}
