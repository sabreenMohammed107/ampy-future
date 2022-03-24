<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDataResource extends JsonResource
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
            "id"=>$this->id,
            "name"=>$this->name ?? '' ,
            "email"=>$this->email ?? '' ,
            "mobile"=>$this->mobile ,
            "emp_code"=>$this->emp_code,
            "image"=> $this->profile ? asset('uploads/users/' . $this->image) :env('APP_URL').'/storage/default_profile.jpeg' ,
            "register_approved" => $this->register_approved ?? 0,
            'transaction'=>TransactionResource::collection($this->transation->take(3)),
             "latestTransaction"=> TransactionResource::make($this->latestTransation),

                        // "latestTransaction"=> $this->latestTransation,

        ];
    }
}
