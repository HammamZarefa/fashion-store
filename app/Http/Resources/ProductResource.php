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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => number_format($this->price, 2),
            'color' => $this->color->name,
            'size' => $this->size->name,
            'condition' => $this->condition->name,
            'material' => $this->material->name,
            'section' => $this->section->name,
            'branch' => $this->branch,
            'location' => $this->location,
            'is_for_sale' => $this->is_for_sale,
            'user' => $this->user->name,
            'categories' => $this->categories->pluck('name'),
            'images' => $this->images,
            'sku' => $this->sku
        ];
    }
}
