<?php

namespace App\Model;

use App\ItemType;
use Illuminate\Database\Eloquent\Model;
use Throwable;

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
        try {
            $details = ['user_id' => $userId, 'item_id' => $itemId];
            $this->updateOrCreate($details)->increment('quantity');
            return true;
        } catch (Throwable $e) {
            report($e);
            return false;
        }
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
        try {
            $details = ['user_id' => $userId, 'item_id' => $itemId];
            $this->where($details)->decrement('quantity');
            return true;
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function discardItem($userId, $itemId)
    {
        try {
            $details = ['user_id' => $userId, 'item_id' => $itemId];

            if ($this->where($details)->where('quantity', '<=', 0)->exists())
            {
                return $this->removeItemtrue($userId, $itemId);
            }

        return $this->decrementItem($userId, $itemId);
        } catch (Throwable $e) {
            report($e);
            return false;
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
        try {
            $details = ['user_id' => $userId, 'item_id' => $itemId];
            $this->where($details)->delete();
            return true;
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function getTypes()
    {
        try {
            $itemtypes = new ItemType;
            return $this->all();
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

}
