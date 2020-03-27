<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
// use Chatter\Core\Traits\CanDiscuss;
// use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * 
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'pivot',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime', 
    ];

    public function items()
    {
         return $this->belongsToMany(User::class,'userItems','item_id');
    }

    public function house() 
    { 
        return $this->belongsToMany(House::class, 'user_houses'); 
    }

    public function scopeGetHouse() 
    { 
        return $this->house()->wherePivot('active', 1)->first(); 
    }

    public function attacks() 
    { 
        return $this->hasOne(Attack::class); 
    }

}