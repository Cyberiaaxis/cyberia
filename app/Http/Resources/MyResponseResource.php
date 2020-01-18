<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MyResponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $html = ' <label class="switch">
        <input class="switch-input"  type="checkbox"/>
        <span class="switch-label" data-on="active" data-off="inactive"></span>
        <span class="switch-handle"></span>
        </label>';

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'permissions' => $this->permissions->pluck('name'),
            'status' => $html,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}