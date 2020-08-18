<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            'name' => $this ->name,
            'email' => $this ->email,
            'username' => $this ->username,
            // 'date' => $this ->created_at->diffForHumans(),
            'api_token' =>$this ->api_token,
            'is_admin' =>$this->is_admin,
            'token_firebase' =>$this->token_firebase
        ];
    }
}
