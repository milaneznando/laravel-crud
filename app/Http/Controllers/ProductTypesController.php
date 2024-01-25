<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductTypeListRequest;
use App\Http\Requests\ProductTypeStoreRequest;
use App\Http\Resources\ProductTypeListResource;
use App\Services\ProductTypeService;
use App\Support\Http\Controllers\BaseController;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;

class ProductTypesController extends BaseController
{
    public function __construct(
        private ProductTypeService $service
    )
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
            $this->service->list($request)
        );
    }

    /**
     * @param \App\Http\Requests\ProductTypeStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductTypeStoreRequest $request): JsonResponse
    {
        $savedProductType = DB::transaction(fn () => $this->service->save($request->validated()));

        return (new ProductTypeListResource($savedProductType))
            ->response()
            ->setStatusCode(HttpResponse::HTTP_CREATED);
    }
}
