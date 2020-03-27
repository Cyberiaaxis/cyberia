<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','cost'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
