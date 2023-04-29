<?php

namespace App\Http\Resources\CRUD;

use Illuminate\Http\Resources\Json\JsonResource;

class SubdivisionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title
        ];
    }
}
