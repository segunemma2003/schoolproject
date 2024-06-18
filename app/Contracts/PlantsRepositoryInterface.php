<?php

namespace App\Contracts;

use App\Models\Admin\Plants;
use App\Http\Requests\PlantsRequest;

interface PlantsRepositoryInterface
{
    public function indexPlants();

    public function createPlants();

    public function storePlants(PlantsRequest $request);

    public function showPlants(Plants $Plants);

    public function editPlants(Plants $Plants);

    public function updatePlants(PlantsRequest $request, Plants $Plants);

    public function destroyPlants(Plants $Plants);
}
