<?php

namespace App\Services;

use App\Repositories\ProductTypeRepository;
use App\Support\Service\BaseService;

class ProductTypeService extends BaseService
{
    /**
     * Constructor method
     *
     * @param \App\Repositories\ProductTypeRepository $repository
     */
    public function __construct(ProductTypeRepository $repository)
    {
        parent:: __construct($repository);
    }
}
