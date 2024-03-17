<?php

namespace App\Repositories;

use App\Models\Building;

class BuildingRepository implements BuildingRepositoryInterface
{
    public function create(array $data)
    {
        return Building::create($data);
    }
}
