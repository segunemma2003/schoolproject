<?php

namespace App\Http\Resources\V1\Disease;

use App\Http\Resources\V1\Disease\DiseaseResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DiseaseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return DiseaseResource::collection($this->collection);
    }
}
