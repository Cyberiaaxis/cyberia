<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class Rank extends Model
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRankById(int $id) : string
    {
       dd($this->where(['id' => $id])->value('name'));
    }
}
