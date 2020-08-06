<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * get country name by this method.
     * @param  INT  $id
     * @return string country name
     */
    public function getCountryById(int $id): string
    {
        return $this->find($id)->value('name');
    }
}
