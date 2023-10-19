<?php

namespace App\Http\Resources\V1\Disease;

use Illuminate\Http\Resources\Json\JsonResource;

class DiseaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'diseases',
            'id' => (string) $this->id,
            'attributes' => parent::toArray($request),
            'links' => [
                'self' => route('api.disease.show', $this->id)
            ]
        ];
    }
}
