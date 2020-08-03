<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class Level extends Model
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLevelById(int $levelId): string
    {
        try {
            return $this->where('id', $levelId)->value('name');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }
}
