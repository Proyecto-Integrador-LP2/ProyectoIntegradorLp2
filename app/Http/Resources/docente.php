<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class docente extends JsonResource
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
            'docente_id' => $this->docente_id,
            'use_id' => $this->use_id,
            'docente_cod_docente' => $this->docente_cod_docente,
            'docente_descripcion' => $this->docente_descripcion,
        ];
    }
}
