<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this->itemCategories->itemCategoryName);
        $checked = null;
        $delete = '<button type="button" class="btn-sm delete" title="Delete" data-href="'.route('items.destroy',$this->id).'" data-id="'.$this->id.'">
        <i class="glyphicon glyphicon-trash"></i></button>';
        $data =  [
            'id' => $this->id,
            'name' => $this->name,
            'description'=> 'kkkkkk',   
            'itemCategory'=> $this->itemCategories->name,  
            'itemType'=> $this->itemTypes->itemTypeName,  
            'buyPrice'=> $this->buyPrice,  
            'sellPrice'=> $this->sellPrice,  
            'locationId'=> $this->locationId, 
            'updated_at' => $this->updated_at->diffForHumans(),
            'created_at' => $this->created_at->diffForHumans(),
            'operate' => $delete
         ];

        $data['_id_data'] = ["id" => $this->id, "href" => route('items.update', $this->id)];
    return $data;
    }
}

        
