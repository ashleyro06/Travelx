<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Viaje extends JsonResource
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
            'id'                => $this->id,
            'nombre'            => $this->nombre,
            'descripcion'       => $this->descripcion,
            'fecha'             => $this->fecha,
            'lugar'             => $this->lugar,
            'presupuesto'       => $this->presupuesto,
            'foto'              => $this->foto,
            'planeado'          => $this->planeado,
            'realizado'         => $this->realizado,
        ];
    }
 

}