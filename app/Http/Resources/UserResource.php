<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $checked = null;
        $delete = '<button type="button" class="btn-sm delete" title="Delete" data-href="'.route('users.destroy',$this->id).'" data-id="'.$this->id.'">
        <i class="glyphicon glyphicon-trash"></i></button>';
        $roles = $this->roles->pluck('name');
        $edit = '<button type="button" title="Edit" data-href="'.route('users.edit',$this->id).'" class="btn-sm edit" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i></button>';
        $data =  [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'roles' => $roles, 
            'operate' => "$delete $edit",
            'created_at' => $this->created_at->diffForHumans()
        ];
        $data['_id_data'] = ["id" => $this->id, "href" => route('users.update', $this->id)];
    return $data;
    } 
}    
