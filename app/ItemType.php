<?php

namespace App;

use App\Item;
use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    protected $table = 'itemTypes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id','name' ];

    public function categories() 
    { 
        return $this->belongsTo(Category::class);
    }

    public function items() 
    { 
        return $this->belongsTo(Item::class, 'ItemTypeId');
    }
}
