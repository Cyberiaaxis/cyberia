<?php

namespace App;

use App\Model\{AttackRecord, Award, Medal, Reward, UserDetail, UserReward};
use App\Models\{Post};
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

    protected $dates = ['created_at', 'updated_at', 'last_seen'];

    public function userdetails()
    {
        return $this->HasOne(UserDetail::class);
    }

    public function items()
    {
         return $this->belongsToMany(Item::class, 'user_items');
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

    public function stats()
    {
        return $this->hasOne(UserStats::class);
    }

    public function rewards()
    {
        return $this->belongsToMany(Reward::class, 'user_rewards');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
    * get total posts
    */
     public function getTotalPostsAttribute()
     {
         return $this->posts()->count();
    }
}

