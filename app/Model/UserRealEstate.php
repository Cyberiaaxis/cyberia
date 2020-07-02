<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserRealEstate extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'real_estate_id', 'total'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function addUserRealEstate(int $user, int $realEstateId)
    {
        return $this->updateOrCreate(['user_id' => $user, 'real_estate_id' => $realEstateId])->increment('total', 1);
    }

}
