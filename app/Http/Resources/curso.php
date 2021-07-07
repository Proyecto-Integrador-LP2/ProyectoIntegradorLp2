<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class curso extends JsonResource
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
            'curso_id' => $this->curso_id,
            'curso_nombre' => $this->curso_nombre,
            'curso_descripcion' => $this->curso_descripcion,
            'curso_estado' => $this->curso_estado,
        ];
    }
}
