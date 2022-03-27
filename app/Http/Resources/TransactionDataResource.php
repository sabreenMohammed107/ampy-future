<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionDataResource extends JsonResource
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

            'transaction' => transForDataResource::make($this->transaction),
            'basic_salary' => $this->net_salary,
            'settlements' => $this->settlements,
            'allowances' => $this->allowances,
            'total_dues'=>$this->net_salary+$this->settlements+$this->allowances,

            'taxes' => $this->taxes,
            'insurance' => $this->insurance,

            'total_deductions'=>$this->taxes+$this->insurance,
            'net'=> ($this->net_salary+$this->settlements+$this->allowances)-($this->taxes+$this->insurance),
        ];

    }
}
