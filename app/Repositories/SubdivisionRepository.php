<?php

namespace App\Repositories;

use App\Models\Subdivision;
use Illuminate\Support\Collection;

class SubdivisionRepository extends AbstractRepository
{
    public function getModelClass()
    {
        return Subdivision::class;
    }
}
