<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Shop extends Model
{
    /**
     * get shops from storage.
     * @param
     * @return array
     */
    public function getShops()
    {
        return  $this->where('location_id', auth()->user()->userdetails->location_id)->get();
    }

    /**
     * get shops items from storage.
     * @param
     * @return array
     */
    public function getShopItems(int $typeId)
    {

    }

}


