<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrdemServicoResource extends JsonResource
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
            'id'            => $this->id,
            'contratante'   => $this->contratante,
            'responsavel'   => $this->funcionario,
            'tipagem'       => $this->tipagem,
            'natureza'      => $this->natureza,
            'inicio'        => $this->inicio
        ];
    }
}
