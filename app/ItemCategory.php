<?php

namespace App;

use App\{Item, ItemType, ItemCategory};
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table = 'itemCategory';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'itemCategoryName' ];

    public function itemCategories() 
    { 
        return $this->belongsTo(ItemCategory::class);
    }

    public function items() 
    { 
        $this->belongsTo(Item::class,'Id');
    }

    public function itemTypes() 
    { 
        return $this->hasMany(ItemType::class, 'id');
    }


}
