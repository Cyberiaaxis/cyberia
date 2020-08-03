<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class UserReward extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Awards
     */
    public function award()
    {
        return $this->belongsTo(Award::class);
    }

    /**
     * Medals
     */
    public function medal()
    {
        return $this->belongsTo(Medal::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTotalRewards(int $userId): int
    {
        try {
            return  $this->where('user_id', $userId)->count();
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }
}
