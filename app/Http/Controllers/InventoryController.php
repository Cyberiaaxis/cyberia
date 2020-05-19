<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemEffect;
use App\Model\Inventory;
use GeneralDrug;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use Validator;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth()->user()->items;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function useItem(Item $item)
    {

        dd(useType($item->itemTypes->effect_type));
        $itemEffect = new ItemEffect();
        dd($itemEffect->getEffect(1)->item_id);
        $userItem = new Inventory();
        $userItem->discardItem(auth()->user()->id, $item->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tradeItem(Request $request)
    {
        $this->validation($request);
        $userItem = new Inventory();
        $this->sender(auth()->id(), 1);
        $this->receiver(60, 1);
    return "Trade done";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sender($userId, $itemId)
    {
        $userItem = new Inventory();
    return $userItem->discardItem($userId, $itemId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function receiver($userId, $itemId)
    {
        $userItem = new Inventory();
    return  $userItem->incrementItem($userId, $itemId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validation($inputs)
    {
        $validate = Validator::make($inputs->all(), [
            'quantity' => 'required|min:0',
        ]);

        if ($validate->fails()) {
            return "You dont have this item";
        }

    return $inputs;
    }

}

// function tradeItem()
// {
//     //query for change (decrement quantity from sender and incerment of reciver)
// }

// function useItem()
// {
//     itemEffect();
//     removeItem();
// }

// function discardItem()
// {
//     removeItem();
// }

// function removeItem()
// {
//     // update query quantity from user_items
// }

// function itemEffect()
// {
//     // decided benefits give to user
// }