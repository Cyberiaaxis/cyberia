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
        'name', 'description', 'categoryId',  'itemType',  'buyPrice',  'sellPrice',  'locationId',  'expiry',  'updated_at',  'created_at'
    ];

    public function categories() 
    { 
        return $this->belongsTo(Category::class);
    }

    public function items() 
    { 
        return $this->morphTo(); 
    }

    public function itemTypes()
    {
         return $this->belongsTo(ItemType::class,'itemTypeId');
    }

    public function itemCategories()
    {
         return  $this->belongsTo(ItemCategory::class,'id');
    }
}


