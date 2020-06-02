<?php

namespace App\Model;

use App\{Item, ItemType};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ItemEffect extends Model
{
    protected $table = 'item_effects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'effect_type', 'qty' ];


    // public function items()
    // {
    //    return $this->belongsTo(Item::class);
    // }

    // public function itemTypes()
    // {
    //      return $this->belongsTo(ItemType::class);
    // }

    // public static function getEffect($item_id)
    // {
    //     return $this->where('item_id', $item_id);
    // }

    // public function scopeGetEffect(Builder $query, $item_id)
    // {
    //     return $query->where('item_id', $item_id)->get();
    // }

}


