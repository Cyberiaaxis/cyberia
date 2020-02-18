<?php

namespace App;

use App\{Item, ItemType, ItemCategory};
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table = 'itemCategories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id','name' ];

    public function itemCategories() 
    { 
        return $this->belongsTo(ItemCategory::class);
    }

    public function items() 
    { 
       return $this->belongsTo(Item::class, 'itemCategoryId');
    }

    public function itemTypes() 
    { 
         return $this->hasMany(ItemType::class, 'itemCategoryId');
    }

    // public function items() 
    // { 
    //     return $this->morphMany(Item::class,'itemable'); 
    // }

}

// $items = DB::table('items')
            // ->join('itemTypes', 'itemTypes.id', '=', 'items.itemTypeId')
            // ->join('itemCategory', 'itemCategory.id', '=', 'items.itemCategoryId')
            // ->get();