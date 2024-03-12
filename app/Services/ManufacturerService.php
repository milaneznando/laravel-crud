<?php

namespace App\Services;

use App\Repositories\ManufacturerRepository;
use App\Support\Service\BaseService;

class ManufacturerService extends BaseService
{
    /**
     * Constructor method
     *
     * @param \App\Repositories\ManufacturerRepository $repository
     */
    public function __construct(ManufacturerRepository $repository)
    {
        parent:: __construct($repository);
    }
}
