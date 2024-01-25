<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductTypeListRequest;
use App\Support\Http\Controllers\BaseController;
use Illuminate\Http\Resources\Json\ResourceCollection;
use ProductTypeListResource;
use ProductTypeService;

class ProductTypesController extends BaseController
{
    public function __construct(private ProductTypeService $service)
    {
        //
    }

    /**
     * @param \App\Http\Requests\ProductTypeListRequest $request
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(ProductTypeListRequest $request): ResourceCollection
    {
        return ProductTypeListResource::collection(
            $this->service->list($request->data())
        );
    }
}
