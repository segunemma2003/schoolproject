<?php

namespace App\Repositories;

use App\Models\Admin\Disease;
use Illuminate\Support\Facades\Cache;
use App\Contracts\DiseaseRepositoryInterface;
use App\Http\Requests\DiseaseRequest;

class DiseaseRepository implements DiseaseRepositoryInterface
{
    // Disease Index
    public function indexDisease()
    {
        $diseases = config('adminetic.caching', true)
            ? (Cache::has('diseases') ? Cache::get('diseases') : Cache::rememberForever('diseases', function () {
                return Disease::latest()->get();
            }))
            : Disease::latest()->get();
        return compact('diseases');
    }

    // Disease Create
    public function createDisease()
    {
        //
    }

    // Disease Store
    public function storeDisease(DiseaseRequest $request)
    {
        Disease::create($request->validated());
    }

    // Disease Show
    public function showDisease(Disease $disease)
    {
        return compact('disease');
    }

    // Disease Edit
    public function editDisease(Disease $disease)
    {
        return compact('disease');
    }

    // Disease Update
    public function updateDisease(DiseaseRequest $request, Disease $disease)
    {
        $disease->update($request->validated());
    }

    // Disease Destroy
    public function destroyDisease(Disease $disease)
    {
        $disease->delete();
    }
}
