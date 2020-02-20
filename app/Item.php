<?php

namespace App;

use App\ItemType;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'itemCategoryId',  'itemTypeId',  'buyPrice',  'sellPrice',  'locationId',  'expiry',  'updated_at',  'created_at'
    ];

    public function itemCategories() 
    { 
        return $this->belongsTo(ItemCategory::class, 'itemCategoryId');
    }


    public function itemTypes()
    {
         return $this->belongsTo(ItemType::class,'itemTypeId');
    }

    public function user()
    {
         return $this->belongsToMany(User::class,'userItems','user_id');
    }


}

