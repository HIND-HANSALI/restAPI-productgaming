<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->id,
            'tiiitle'=>$this->titreProduit,
            'contenu'=>$this->contenu,
            'description'=>$this->description,
            'prix'=>$this->prix,
            
        ];
    }
}
