<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Item;

class CityController extends Controller
{
    /**
     * Chceck items in market
     */
    public function itemsMarket()
    {
        $item = new Item();
    return $item->all();
    }
}
