<?php

namespace App\Repositories;

use App\Models\Admin\Plant;
use Illuminate\Support\Facades\Cache;
use App\Contracts\PlantRepositoryInterface;
use App\Http\Requests\PlantRequest;

class PlantRepository implements PlantRepositoryInterface
{
    // Plant Index
    public function indexPlant()
    {
        $plants = config('adminetic.caching', true)
            ? (Cache::has('plants') ? Cache::get('plants') : Cache::rememberForever('plants', function () {
                return Plant::latest()->get();
            }))
            : Plant::latest()->get();
        return compact('plants');
    }

    // Plant Create
    public function createPlant()
    {
        //
    }

    // Plant Store
    public function storePlant(PlantRequest $request)
    {
        Plant::create($request->validated());
    }

    // Plant Show
    public function showPlant(Plant $plant)
    {
        return compact('plant');
    }

    // Plant Edit
    public function editPlant(Plant $plant)
    {
        return compact('plant');
    }

    // Plant Update
    public function updatePlant(PlantRequest $request, Plant $plant)
    {
        $plant->update($request->validated());
    }

    // Plant Destroy
    public function destroyPlant(Plant $plant)
    {
        $plant->delete();
    }
}
