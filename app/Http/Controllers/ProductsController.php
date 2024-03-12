<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductListRequest;
use App\Http\Requests\ProductTypeStoreRequest;
use App\Http\Requests\ProductTypeUpdateRequest;
use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductTypeListResource;
use App\Http\Resources\ProductTypeResource;
use App\Models\ProductType;
use App\Services\ProductService;
use App\Support\Http\Controllers\BaseController;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;

class ProductsController extends BaseController
{
    public function __construct(private ProductService $service)
    {
        //
    }

    /**
     * List existing records
     *
     * @param \App\Http\Requests\ProductListRequest $request
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(ProductListRequest $request): ResourceCollection
    {
        return ProductListResource::collection(
            $this->service->list($request)
        );
    }

    /**
     * Store a new record
     *
     * @param \App\Http\Requests\ProductTypeStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductTypeStoreRequest $request): JsonResponse
    {
        $savedProductType = DB::transactpubfion(fn () => $this->service->save($request->validated()));

        return (new ProductTypeListResource($savedProductType))
            ->response()
            ->setStatusCode(HttpResponse::HTTP_CREATED);
    }

    /**
     * Returns specified product type
     *
     * @param \App\Models\ProductType $productType
     * @return \App\Http\Resources\ProductTypeResource
     */
    public function show(ProductType $productType): ProductTypeResource
    {
        return new ProductTypeResource($productType);
    }

    /**
     * Update and specific product type
     *
     * @param \App\Models\ProductType $productType
     * @param \App\Http\Requests\ProductTypeUpdateRequest $request
     * @return \App\Http\Resources\ProductTypeResource|\Illuminate\Http\JsonResponse
     */
    public function update(ProductType $productType, ProductTypeUpdateRequest $request): ProductTypeResource|JsonResponse
    {
        try{
            /**
             * Here we do not need to create a new update method inside the ProductTypeRepository
             * because it extends from BaseRepository which already has an update method.
             * That's why I am passing an array of objects and the model as a parameter
             */
            $updatedProductType = DB::transaction(fn () => $this->service->update($request->data(), $productType));

            return (new ProductTypeResource($updatedProductType))
                ->response()
                ->setStatusCode(HttpResponse::HTTP_CREATED);

        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
