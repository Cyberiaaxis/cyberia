<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'user_items';
    protected $fillable = ['user_id', 'item_id'];
    public $timestamps = false;

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function incrementItem($userId, $itemId)
    {
        $details = ['user_id' => $userId, 'item_id' => $itemId];
        $this->updateOrCreate($details)->increment('quantity');
        return true;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function decrementItem($userId, $itemId)
    {
        $details = ['user_id' => $userId, 'item_id' => $itemId];
        $this->where($details)->decrement('quantity');
        return true;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function getItemQuantity($userId, $itemId)
    {
        $details = ['user_id' => $userId, 'item_id' => $itemId];
        if($this->where($details)->where('quantity', '<=', 0)->exists())
        {
            return true;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function removeItem($userId, $itemId)
    {
        $details = ['user_id' => $userId, 'item_id' => $itemId];
        $this->where($details)->delete();
    }
}
