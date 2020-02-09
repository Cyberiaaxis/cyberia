<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemCategoryResource extends JsonResource
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
        // dd($this->itemCategoryName);
        // $html = '<label class="switch switch-sm">
        // <input class="switch-input" type="checkbox"' .$checked.' disabled/>
        // <span class="switch-label" data-on="active" data-off="inactive"></span>
        // <span class="switch-handle"></span>
        // </label>';
        $delete = '<button type="button" class="btn-danger btn-sm delete" title="Delete" data-href="'.route('itemCategories.destroy',$this->id).'" data-id="'.$this->id.'"><i class="glyphicon glyphicon-trash"></i></button>';
        $data =  [
           'id' => $this->id,
            'name' => $this->name,
            // 'description' => $this->description,
            'operate' => "$delete",
            // 'created_at' => $this->created_at->diffForHumans() ?? null,
            // 'updated_at' => $this->updated_at->diffForHumans() ?? null
        ];
        $data['_id_data'] = ["id" => $this->id, "href" => route('itemCategories.update', $this->id)];
    return $data;
    }
}    
