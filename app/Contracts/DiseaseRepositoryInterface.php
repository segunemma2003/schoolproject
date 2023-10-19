<?php

namespace App\Contracts;

use App\Models\Admin\Disease;
use App\Http\Requests\DiseaseRequest;

interface DiseaseRepositoryInterface
{
    public function indexDisease();

    public function createDisease();

    public function storeDisease(DiseaseRequest $request);

    public function showDisease(Disease $Disease);

    public function editDisease(Disease $Disease);

    public function updateDisease(DiseaseRequest $request, Disease $Disease);

    public function destroyDisease(Disease $Disease);
}
