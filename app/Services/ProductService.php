<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\ProductTypeRepository;
use App\Support\Service\BaseService;

class ProductService extends BaseService
{
    /**
     * Constructor method
     *
     * @param \App\Repositories\ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        parent:: __construct($repository);
    }
}
