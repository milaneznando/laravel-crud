<?php

use App\Repositories\ProductTypeRepository;
use App\Support\Service\BaseService;

class ProductTypeService extends BaseService
{
    /**
     * @param \App\Repositories\ProductTypeRepository $repository
     */
    public function __construct(ProductTypeRepository $repository)
    {
        parent:: __construct($repository);
    }
}