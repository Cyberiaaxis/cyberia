<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

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
}
