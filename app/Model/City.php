<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Throwable;

class City extends Model
{
    /**
     * get city name by id from storage.
     * @param  variable $id INT
     * @return string name
     */
    public function getCityById(int $id): string
    {
        try {
            return $this->find($id)->value('name');
        } catch (Throwable $e) {
            $e->getMessage();
            report($e);
        }
    }
}
