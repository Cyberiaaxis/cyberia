<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    public function crimes()
    {
        return $this->hasMany(Crime::class);
    }
}
