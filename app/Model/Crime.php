<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    /**
     * Scope a query to only include crimes of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSubCrimes($query, $crime)
    {
        return $query->where('parent_id', $crime);
    }
}
