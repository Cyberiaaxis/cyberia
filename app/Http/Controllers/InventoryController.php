<?php

namespace App\Http\Controllers;

use App\Model\Inventory;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tradeItem(Request $request)
    {
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
        if($userItem->getItemQuantity($userId, $itemId)){
            return $userItem->removeItem($userId, $itemId);
        }

    return $userItem->decrementItem($userId, $itemId);
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
