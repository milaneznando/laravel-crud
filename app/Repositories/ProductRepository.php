<?php

namespace App\Repositories;

use App\Models\Product;
use App\Support\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProductRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function modelClass(): string
    {
        return Product::class;
    }

    /**
     * List existing records
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Pagination\Paginator
     */
    public function list(Request $request): Paginator
    {
        $query = $this->entity;

        if($request['product_name']):
            return $query->where('product_name', 'like', '%' . $request["product_name"] . '%')->simplePaginate(perPage: 10);
        else:
            return $query->simplePaginate(perPage: 10);
        endif;
    }

    /**
     * Store a new register
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function save(array $data): Model
    {
        $productType = $this->entity;

        $productType->product_type_name = $data['name'];
        $productType->save();

        return $productType;
    }
}
