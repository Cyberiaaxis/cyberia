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
        try {
            return  $this->where(['id' => $id])->value('name');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }
}
