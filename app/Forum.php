<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{

    protected $table = 'forums';



    public function threads()
    {
        return $this->hasMany(Thread::class);
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function users()
    {
        return $this->belongsTo("User");
    }
}
