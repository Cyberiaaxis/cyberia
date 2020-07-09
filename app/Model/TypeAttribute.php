<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TypeAttribute extends Model
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEffectsId($typeId)
    {
        return $this->where('type_id', $typeId)->value('item_effect_id');
    }
}
