<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
     * get a Area name instance.
     * @param  $id INT
     * @return name string
     */
    public function getAreaById(int $id): string
    {
        return  $this->find($id)->value('name');
    }
}
