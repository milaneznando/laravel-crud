<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResource extends JsonResource
{
    /**
     * Array response
     *
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'product_id' => $this->resource->id,
            'product_name' => $this->resource->product_name,
            'product_type_name' => $this->resource->product_type_name,
            'product_price' => $this->resource->product_price,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
        ];
    }
}
