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
        $selectArray = [
            'product.id',
            'product.product_name',
            'product_type.product_type_name',
            'product.product_price',
            'product.created_at',
            'product.updated_at',
            'manufacturer.manufacturer_name',
        ];

        if($request['product_name']):
            return $query->select($selectArray)
                ->join('product_type', 'product.product_type_id', '=', 'product_type.id')
                ->join('manufacturer', 'product.manufacturer_id', '=', 'manufacturer.id')
                ->where('product_name', 'like', '%' . $request["product_name"] . '%')
                ->orderBy('product.id', 'asc')
                ->simplePaginate(perPage: 10);

        else:
            return $query->select($selectArray)
                ->join('product_type', 'product.product_type_id', '=', 'product_type.id')
                ->join('manufacturer', 'product.manufacturer_id', '=', 'manufacturer.id')
                ->orderBy('product.id', 'asc')
                ->simplePaginate(perPage: 10);
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

        $productType->product_type_id = $data['product_type_id'];
        $productType->manufacturer_id = $data['manufacturer_id'];
        $productType->product_name = $data['product_name'];
        $productType->product_price = $data['product_price'];
        $productType->save();

        return $productType;
    }
}
