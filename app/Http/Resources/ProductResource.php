<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->product_category_id,
            'image' => $this->image,
            'price' => $this->price,
            'in_stock' => $this->stock,
            'min_stock' => $this->stock_defective,
            'total_sold' => count($this->solds),
        ];
    }
}
