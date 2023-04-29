<?php

namespace App\Http\Resources\CRUD;

use Illuminate\Http\Resources\Json\JsonResource;

class PositionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subdivision' => $this->subdivision
        ];
    }
}
