<?php

namespace App\Http\Controllers;

use App\Model\ItemType;
use App\Model\Shop;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = new Shop();
    return $shops->getShops();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $market)
    {
        $shop = new Shop();
    return $shop->getShopItems($market->item_type);
    }
}
