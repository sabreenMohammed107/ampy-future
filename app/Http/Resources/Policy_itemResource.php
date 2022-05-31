<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Policy_itemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            "item_ar"=>$this->item_ar ?? '',
            'item_en'=>$this->item_en ?? '',
            'details_en'=>$this->details_en ?? '',
            'details_ar'=>$this->details_ar ?? '',
        ];

    }
}
