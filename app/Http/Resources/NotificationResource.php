<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'user_id' => $this->user_id,
            'transaction_id' => $this->transaction_id,
            'transaction_code' => $this->transaction_code,
            'description' => $this->description,
        ];
    }
}
