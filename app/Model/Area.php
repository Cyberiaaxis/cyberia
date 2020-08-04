<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class Area extends Model
{
    /**
     * get a Area name instance.
     * @param  $id INT
     * @return name string
     */
    public function getAreaById(int $id): string
    {
        try {
            return  $this->find($id)->value('name');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }
}
