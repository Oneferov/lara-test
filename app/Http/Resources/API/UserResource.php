<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'user_type_id' => $this->user_type->id,
            'position_id' => $this->position->id,
            'subdivision_id' => $this->position->subdivision_id
        ];
    }
}
