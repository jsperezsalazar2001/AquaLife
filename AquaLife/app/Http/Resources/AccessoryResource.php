<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccessoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'category' => $this->getCategory(),
            'price' => $this->getPrice(),
            'in_stock' => $this->getInStock(),
            'description' => $this->getDescription(),
        ];
    }
}
