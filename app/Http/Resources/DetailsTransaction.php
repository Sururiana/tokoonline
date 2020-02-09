<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailsTransaction extends JsonResource
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
        return[
            'product_id' => $this->product_id,
            'product' => $this->product,
            'qty' => $this->qty,
            'price' => "Rp. ". number_format($this->price,0,'.','.'),
            'total' => "Rp. ". number_format($this->total,0,'.','.'),
        ];
    }
}
