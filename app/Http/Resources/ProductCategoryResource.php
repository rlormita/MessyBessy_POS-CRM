<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
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
            'product_count' => count($this->products),
            'total_stock' => $this->products->sum('stock'),
            'defective_stock' => $this->products->sum('stock_defective'),
            'ave_price' => round($this->products->avg('price'), 2)
        ];
    }
}
