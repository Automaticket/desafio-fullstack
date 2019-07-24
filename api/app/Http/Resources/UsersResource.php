<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->name,
            'email'       => $this->email,
            'father_name' => $this->father_name,
            'mother_name' => $this->mother_name,
            'cell_phone'  => $this->cell_phone,
            'birth_date'  => $this->birth_date,
            'address'     => [
                'cep'          => $this->address->cep,
                'logradouro'   => $this->address->logradouro,
                'number'       => $this->address->number,
                'complement'   => $this->address->complement,
                'neighborhood' => $this->address->neighborhood,
                'city'         => $this->address->city,
                'state'        => $this->address->state,
            ]
        ];
    }
}
