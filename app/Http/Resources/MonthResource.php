<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MonthResource extends JsonResource
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

             'month_ar'=>$this->month_ar ?? '',
             'month_en'=>$this->month_en ?? '',
             "year"=>YearResource::make($this->year),


        ];
    }
}
