<?php

namespace App\Http\Controllers;

use App\Http\{Requests\ProductListRequest,
    Requests\ProductStoreRequest,
    Requests\ProductUpdateRequest,
    Resources\ProductListResource,
    Resources\ProductResource,
};
use Illuminate\{
    Http\JsonResponse,
    Http\Resources\Json\ResourceCollection,
    Support\Facades\DB
};
use App\Models\Product;
use App\Services\ProductService;
use App\Support\Http\Controllers\BaseController;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

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
     * @param \App\Http\Requests\ProductStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductStoreRequest $request): JsonResponse
    {
        $savedProduct = DB::transaction(fn () => $this->service->save($request->validated()));

        return (new ProductListResource($savedProduct))
            ->response()
            ->setStatusCode(HttpResponse::HTTP_CREATED);
    }

    /**
     * Returns specified product type
     *
     * @param \App\Models\Product $product
     * @return \App\Http\Resources\ProductResource
     */
    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    /**
     *  Update and specific product type
     *
     * @param \App\Models\Product $product
     * @param \App\Http\Requests\ProductUpdateRequest $request
     * @return \App\Http\Resources\ProductResource|\Illuminate\Http\JsonResponse
     */

    public function update(Product $product, ProductUpdateRequest $request): ProductResource|JsonResponse
    {
        try{
            /**
             * Here we do not need to create a new update method inside the ProductTypeRepository
             * because it extends from BaseRepository which already has an update method.
             * That's why I am passing an array of objects and the model as a parameter
             */
            $updatedProduct = DB::transaction(fn () => $this->service->update($request->data(), $product));

            return (new ProductResource($updatedProduct))
                ->response()
                ->setStatusCode(HttpResponse::HTTP_CREATED);

        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
