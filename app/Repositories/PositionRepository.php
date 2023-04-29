<?php

namespace App\Repositories;

use App\Models\Position;

class PositionRepository extends AbstractRepository
{
    public function getModelClass()
    {
        return Position::class;
    }
}
