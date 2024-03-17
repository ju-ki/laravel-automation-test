<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Services\BuildingService;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    //
    protected $buildingService;

    public function __construct(BuildingService $buildingService)
    {
        $this->buildingService = $buildingService;
    }


    public function postBuilding(Request $request)
    {
        $validationList = [
            "buildingData.building_name" => ["required", "max:100"],
            "buildingData.floor" => ["required"]
        ];
        $request->validate($validationList);

        $building = $this->buildingService->createBuilding($request["buildingData"]);

        return $building;
    }

    public function getBuildingList()
    {
        $buildings = Building::get();
        return $buildings;
    }

    public function getBuilding(Request $request)
    {
        $building = Building::find($request->id);
        return $building;
    }
}
