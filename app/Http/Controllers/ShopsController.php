<?php

namespace App\Http\Controllers;

use App\Model\Inventory;
use App\Model\ItemType;
use App\Model\Shop;
use App\Model\UserDetail;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    protected $message = NULL;
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
    //     $shop = new Shop();
    // return $shop->getShopItems($market->item_type);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shopInventory(Shop $shop)
    {
        $shoptiems = $shop->getShopItems($shop->item_type);
    return ['shopdetails' => $shop, 'shopItems' => $shoptiems];
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function buyItem(Request $request)
    {
        if($this->canBuy($request) === false) {
            return $this->message;
        }

        $inventory = new Inventory();
        $inventory->incrementItem(auth()->user()->id, $request->itemId);
        $userdetails = new UserDetail();
        $userdetails->decrementMoney(auth()->user()->id, $request->money);
    return "You successfully bought the items";
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function canBuy($request)
    {
        if (auth()->user()->userdetails->money < $request->money) {
            $this->message =  "You dont have enough money to buy this item";
            return false;
        }

        if (auth()->user()->userdetails->location_id === $request->location_id) {
            $this->message =  "You are not on same location as per required";
            return false;
        }

    return true;
    }




}
