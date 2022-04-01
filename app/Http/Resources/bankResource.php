<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class bankResource extends JsonResource
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
            "name_ar"=>$this->name_ar ?? '',
            'name_en'=>$this->name_en ?? '',
       ];

    }
}
