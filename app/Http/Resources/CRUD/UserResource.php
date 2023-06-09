<?php

namespace App\Http\Resources\CRUD;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'user_type_id' => $this->user_type->title,
            'position_id' => $this->position->title,
            'subdivision_id' => $this->position->subdivision
        ];
    }
}
