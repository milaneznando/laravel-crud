<?php

namespace App\Repositories;

use App\Http\Requests\ProductTypeUpdateRequest;
use App\Models\ProductType;
use App\Support\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProductTypeRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function modelClass(): string
    {
        return ProductType::class;
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

        if($request['name']):
            return $query->where('product_type_name', 'like', '%' . $request["name"] . '%')->simplePaginate(perPage: 10);
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

//    public function update(array $data, ProductType|Model|int $type): Model
//    {
//        $a = $request;
//    }
}
