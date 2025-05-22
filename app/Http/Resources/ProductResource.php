<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        return 
        [
            'id' => $this->id,
            'nome' => $this->name,
            'tipo' => $this->type,
            'raridade' => $this->rarity,
            'descrição' => $this->description,
            'nivel_requerido' => $this->requeriment,
            'efeito' => $this->effect,
            'preço' => $this->price,
            'cadastrado' => $this->created_at,
        ];
    }
}
