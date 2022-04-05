<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;


class EmpadronadoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'apellido_nombre' => $this->apellido.", ".$this->nombre,
            'dni' => $this->dni,
            'llamado' => $this->llamado,
            'intencion_voto' => $this->intencion_voto,
            'users' => UserAPIResource::collection($this->users),
            'is_llamado' => $this->isLlamado(Auth::user()->id),
        ];
    }
}
