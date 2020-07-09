<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WeaponAttribute extends Model
{
    public function getattributesById($attributeId)
    {
        return $this->find($attributeId);
    }
}
