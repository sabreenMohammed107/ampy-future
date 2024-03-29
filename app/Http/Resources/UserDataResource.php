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
            "id" => $this->id,
            "name" => $this->name ?? '',
            "email" => $this->email ?? '',
            "mobile" => $this->mobile,
            "emp_code" => $this->emp_code,
            "bank"=>CompanyBankResource::make($this->company),
            "image" => $this->image ? asset('uploads/users/' . $this->image) : asset('adminassets/dist/img/avatar.png') ,
            "register_approved" => $this->register_approved ?? 0,
            'transaction' => TransactionResource::collection($this->transation->take(3)),
            "latestTransaction" => TransactionResource::make($this->latestTransation),
            'address_ar' => $this->address_ar ?? '',
            'job_title_ar' =>$this->job_title_ar ?? '',
            'job_title_en' =>  $this->job_title_en ?? '' ,
            'address_en' => $this->address_en ?? '',
            'accessToken' => $this->accessToken,
            // "latestTransaction"=> $this->latestTransation,

        ];
    }
}
