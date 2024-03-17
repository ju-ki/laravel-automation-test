<?php

namespace App\Services;

use App\Repositories\BuildingRepositoryInterface;

class BuildingService
{
    protected $buildingRepository;

    public function __construct(BuildingRepositoryInterface $buildingRepository)
    {
        $this->buildingRepository = $buildingRepository;
    }

    public function createBuilding(array $data)
    {
        return $this->buildingRepository->create($data);
    }
}
