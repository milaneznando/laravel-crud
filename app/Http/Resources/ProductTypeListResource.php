<?php

use Illuminate\Http\Resources\Json\JsonResource;

class ProductTypeListResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}