<?php

namespace App\Repositories;

use App\Models\ProductType;
use App\Support\Repository\BaseRepository;
use Illuminate\Http\Request;

class ProductTypeRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function modelClass(): string
    {
        return ProductType::class;
    }

    public function list(Request $request)
    {
        dd('aqui');
    }
}
