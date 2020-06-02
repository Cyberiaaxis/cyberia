<?php

namespace App\Model;

use App\model\CrimeMessage;
use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{

    /**
     * Get the comments for the blog post.
     */
    public function messages()
    {
        return $this->hasMany(CrimeMessage::class);
    }

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
    /**
     * Scope a query to only include crimes of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCrimeMessage($query, $crime)
    {
        return $query->where('crime_id', $crime);
    }
}
