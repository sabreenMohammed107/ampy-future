<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationsResourse extends JsonResource
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

            'id' => $this->id,
            'user_id' => $this->user_id,
            'title_ar' => $this->title_ar,
            'title_en'=>$this->title_en,
            'body_ar' => $this->body_ar,
            'body_en' => $this->body_en,
            'status' => $this->status,

        ];

    }
}
