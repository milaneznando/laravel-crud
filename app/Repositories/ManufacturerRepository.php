<?php

namespace App\Repositories;

use App\Models\Manufacturer;
use App\Models\Product;
use App\Support\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ManufacturerRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function modelClass(): string
    {
        return Manufacturer::class;
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

        if($request['manufacturer_name']):
            return $query->where('manufacturer_name', 'like', '%' . $request["manufacturer_name"] . '%')->simplePaginate(perPage: 10);

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
        $manufacturer = $this->entity;

        $manufacturer->manufacturer_name = $data['manufacturer_name'];
        $manufacturer->save();

        return $manufacturer;
    }
}
