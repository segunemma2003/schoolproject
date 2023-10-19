<?php

namespace App\Contracts;

use App\Models\Admin\Plant;
use App\Http\Requests\PlantRequest;

interface PlantRepositoryInterface
{
    public function indexPlant();

    public function createPlant();

    public function storePlant(PlantRequest $request);

    public function showPlant(Plant $Plant);

    public function editPlant(Plant $Plant);

    public function updatePlant(PlantRequest $request, Plant $Plant);

    public function destroyPlant(Plant $Plant);
}
