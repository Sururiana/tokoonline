<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'transaction_code' => $this->transaction_code,
            'user' => ($this->userRelation==null) ? '-' : $this->userRelation->name,
            'destination' => $this->destination,
            'ongkir' => $this->ongkir,
            'resi_code' => $this->code ?: null,
            'kurir' => $this->kurir ?: null,
            'grandtotal' => "Rp. ". number_format ($this->grandtotal,0,'.','.'),
            'status_transaction' => $this->status_transaction,
            'date_transaction' => $this->date_transaction->format('d-m-Y'),
            'detail_transaction' => DetailsTransaction::collection($this->whenLoaded('detailRelation'))
        ];
    }
}
