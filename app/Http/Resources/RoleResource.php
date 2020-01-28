<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
public function toArray($request)
{
        $checked = null;

        if($this->status){
            $checked = "checked";
        }

        $permission = $this->permissions->pluck('name');
        $html = '<label class="switch switch-sm">
        <input class="switch-input" type="checkbox"' .$checked.'/>
        <span class="switch-label" data-on="active" data-off="inactive"></span>
        <span class="switch-handle"></span>
        </label>';
        $edit = '<button type="button" data-href="'.route('roles.edit',$this->id).'" class="btn btn-sm btn-primary edit" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i></button>';
        $action = '<button type="button" class="btn btn-danger btn-sm delete" title="Delete" data-href="'.route('roles.destroy',$this->id).'" data-id="'.$this->id.'"><i class="glyphicon glyphicon-trash"></i></button>';
        $data =  [
           'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'permissions' => $permission,
            'status' => $html,
            'operate' => "$edit $action",
            'created_at' => $this->created_at->diffForHumans() ?? null,
            'updated_at' => $this->updated_at->diffForHumans() ?? null
        ];
        $data['_id_data'] = ["id" => $this->id, "href" => route('roles.update', $this->id)];
    return $data;
    }
} 
