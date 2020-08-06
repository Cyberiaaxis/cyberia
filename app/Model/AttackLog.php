<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class AttackLog extends Model
{
    /**
     * get a Area name instance.
     * @param  $id INT
     * @return name string
     */
    public function addLog($log)
    {
        return $this->insert(['attackLog' => $log]);
    }
}
