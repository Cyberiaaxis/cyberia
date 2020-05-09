<?php

namespace App\Model;

use App\{Item, ItemEffect, User};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserSlot extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'user_id', 'primary_slot', 'secondary_slot'];


    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function itemEffects()
    {
        return $this->belongsTo(ItemEffect::class);
    }

    public function scopeGetSlot(Builder $query, $id)
    {
        return $query->where('primary_slot', $id)->orWhere('secondary_slot', $id);
    }

    public function getWeaponValue($column)
    {
        return $this->itemEffects()->where($column, $column)->select($column)->value($column);
    }

}
