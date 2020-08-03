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
    public function getAreaById(int $id) : string
    {
        try {
            return  $this->where(['id' => $id])->value('name');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }
}
