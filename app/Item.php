<?php

namespace App;

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
}


