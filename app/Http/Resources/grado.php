<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class grado extends JsonResource
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
            'id' => $this->id,
            'nivel' => $this->nivel,
            'nom_grado' => $this->nom_grado,
            'desc_grado' => $this->desc_grado,
        ];
    }
}
