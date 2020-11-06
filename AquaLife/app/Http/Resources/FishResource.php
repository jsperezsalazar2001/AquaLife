<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FishResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'species' => $this->getSpecies(),
            'family' => $this->getFamily(),
            'color' => $this->getColor(),
            'price' => $this->getPrice(),
            'size' => $this->getSize(),
            'temperament' => $this->getTemperament(),
            'in_stock' => $this->getInStock(),
        ];
    }
}
