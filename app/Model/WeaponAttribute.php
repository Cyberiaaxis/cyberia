<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WeaponAttribute extends Model
{
    /**
     * get weapon's attribute by id from storage.
     * @param  INT $id INT
     * @return variable string
     */
    public function getattributesById(int $attributeId)
    {
        return $this->find($attributeId);
    }
}
