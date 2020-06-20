<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Shop extends Model
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Crime  $crime;
     * @return \Illuminate\Http\Response
     */
    public function getShops()
    {
        return  $this->where('location_id', auth()->user()->userdetails->location_id)->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crime  $crime;
     * @return \Illuminate\Http\Response
     */
    public function getShopItems($typeId)
    {
        $typeattribute = new TypeAttribute();
        $getAttribute = $typeattribute->getAttributeId($typeId);
        $item = new Item();        // $attributetoitems  = $typeattribute->with('items')->find($typeId);
    return $item->where('type_attribute_id', $getAttribute)->get();
    }

}


