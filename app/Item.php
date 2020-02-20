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

    protected $appends = ['category_name','item_type_name'];

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

    /**
     * get Item Category Name
     */
    public function getItemCategoryNameAttribute()
    {
        return $this->itemCategories()->value('name');
    }

        /**
     * get Item Type Name
     */
    public function getItemTypeNameAttribute()
    {
        return $this->itemTypes()->value('name');
    }

}

