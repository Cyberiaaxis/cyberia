<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this);
        $checked = null;
        $delete = '<button type="button" class="btn-sm delete" title="Delete" data-href="'.route('permissions.destroy',$this->id).'" data-id="'.$this->id.'">
        <i class="glyphicon glyphicon-trash"></i></button>';
        $data =  [
            'id' => $this->id,
            'name' => $this->name,
            'operate' => $delete
        ];

        $data['_id_data'] = ["id" => $this->id, "href" => route('permissions.update', $this->id)];
    return $data;
    }
}
