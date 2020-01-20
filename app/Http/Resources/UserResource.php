<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
public function toArray($request)
{

        $checked = null;

        if($this->status){
            $checked = "checked";
        }

        $html = ' <label  class="switch switch-sm">
        <input class="switch-input" data-href="'.route('users.update',$this->id).'" type="checkbox"' .$checked.'/>
        <span class="switch-label" data-on="active" data-off="inactive"></span>
        <span class="switch-handle"></span>
        </label>';
        $delete = '<button type="button" class="btn btn-danger btn-sm delete" title="Delete" data-href="'.route('users.destroy',$this->id).'" data-id="'.$this->id.'">
        <i class="glyphicon glyphicon-trash"></i></button>';
        $permissions = '<a href="'.route('operations', $this->id).'">'. $this->getPermissionViaRoles()->pluck('name') .'</a>';
        $data =  [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'permissions' => $permissions, 
            'status' => $html,
            'operate' => $delete,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans()
        ];

        $data['_id_data'] = ["id" => $this->id, "href" => route('users.update', $this->id)];

        return $data;

    }
} 
