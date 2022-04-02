<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserAPIResource extends JsonResource
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
            'apellido_nombre' => ucwords(mb_strtolower($this->lastname. ", ". $this->name)),
            'email' => $this->email,
            'phone' => $this->phone,
            'enabled' => $this->enabled,
        ];
    }
}
