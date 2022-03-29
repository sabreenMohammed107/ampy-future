<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class aboutUsResource extends JsonResource
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
            "who_we_are_ar"=>$this->who_we_are_ar,
            'who_we_are_en'=>$this->who_we_are_en,
            'what_we_do_ar'=>$this->what_we_do_ar,
            'what_we_do_en'=>$this->what_we_do_en,
        ];

    }
}
