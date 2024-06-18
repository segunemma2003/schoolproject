<?php

namespace App\Repositories;

use App\Models\Admin\Plants;
use Illuminate\Support\Facades\Cache;
use App\Contracts\PlantsRepositoryInterface;
use App\Http\Requests\PlantsRequest;

class PlantsRepository implements PlantsRepositoryInterface
{
    // Plants Index
    public function indexPlants()
    {
        $plants = config('adminetic.caching', true)
            ? (Cache::has('plants') ? Cache::get('plants') : Cache::rememberForever('plants', function () {
                return Plants::latest()->get();
            }))
            : Plants::latest()->get();
        return compact('plants');
    }

    // Plants Create
    public function createPlants()
    {
        //
    }

    // Plants Store
    public function storePlants(PlantsRequest $request)
    {
        Plants::create($request->validated());
    }

    // Plants Show
    public function showPlants(Plants $plants)
    {
        return compact('plants');
    }

    // Plants Edit
    public function editPlants(Plants $plants)
    {
        return compact('plants');
    }

    // Plants Update
    public function updatePlants(PlantsRequest $request, Plants $plants)
    {
        $plants->update($request->validated());
    }

    // Plants Destroy
    public function destroyPlants(Plants $plants)
    {
        $plants->delete();
    }
}
