<?php

namespace App\Http\Controllers\Api\V1\Client;

use App\Models\Admin\Disease;
use App\Http\Resources\V1\Disease\DiseaseCollection;
use App\Http\Resources\V1\Disease\DiseaseResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiseaseClientAPIController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\V1\Disease\DiseaseCollection
     */
    public function index()
    {
        return new DiseaseCollection(Disease::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Admin\Disease  $disease
     * @return \App\Http\Resources\V1\Disease\DiseaseResource
     */
    public function show(Disease $disease)
    {
        return new DiseaseResource($disease);
    }
}
