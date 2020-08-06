<?php

namespace App\Model;

use App\Model\{AttackRecord, Award, Course, Medal, Reward, UserDetail, UserReward, UserSlot};
use App\Models\{Post};
use Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Throwable;

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

    /**
    * get total posts
    */
    public function getTotalPostsAttribute()
    {
         return $this->posts()->count();
    }

    public function course()
    {
         return $this->belongsToMany(Course::class, 'user_courses');
    }

    public function doneCourse($course_id)
    {
         return $this->course()->where('course_id',$course_id)->exists();
    }

    /**
     * add a new user.
     * @param  request $request
     * @return UserId $id
     */
    public function addUser($request)
    {
        return $this->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }

    /**
     * add a new user instance after a valid registration.
     *
     * @param  array  $request
     * @return \App\User
     */
    public function getUserNameById($userId)
    {
        return $this->where('id', $userId)->value('name');
    }

    /**
     * Create a new userDetails instance after a valid registration.
     *
     * @param  array  $userIda
     * @return \App\User
     */
    public function getAge(int $userId)
    {
        return  $this->where(['id' => $userId])->value('created_at');
    }

}

