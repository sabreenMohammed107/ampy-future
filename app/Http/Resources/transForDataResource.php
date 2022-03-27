<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class transForDataResource extends JsonResource
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
            "month"=>MonthResource::make($this->month),
            // 'transaction_details'=>TransactionDetailsResource::collection($this->transaction_details),
            'user'=>$this->user,
        ];

    }
}
