<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this ->id,
            'product' => ucfirst($this ->product),
            'price' => (int) $this ->price,
            'stock' => (int) $this ->stock,
            'description' => $this ->description,
            'image' => $this ->whenLoaded(
                'latestImage',
                asset('uploads/'.$this->latestImage->first()->image)
            ),
            'images' => ImagesResource::collection($this->whenLoaded('imageRelation'))
        ];
    }
}
