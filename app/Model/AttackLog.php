<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AttackLog extends Model
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addLog($log)
    {
        return $this->insert(['attackLog' => $log]);
    }
}

