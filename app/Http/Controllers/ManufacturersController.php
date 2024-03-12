<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Services\ManufacturerService;
use App\Http\{Requests\ManufacturerListRequest,
    Requests\ManufacturerStoreRequest,
    Resources\ManufacturerListResource
};
use Illuminate\{
    Http\JsonResponse,
    Http\Resources\Json\ResourceCollection,
    Support\Facades\DB
};
use App\Support\Http\Controllers\BaseController;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ManufacturersController extends BaseController
{
    public function __construct(private ManufacturerService $service)
    {
        //
    }

    /**
     * List existing records
     *
     * @param \App\Http\Requests\ManufacturerListRequest $request
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(ManufacturerListRequest $request): ResourceCollection
    {
        return ManufacturerListResource::collection(
            $this->service->list($request)
        );
    }

    /**
     * Store a new record
     *
     * @param \App\Http\Requests\ManufacturerStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ManufacturerStoreRequest $request): JsonResponse
    {
        $savedProduct = DB::transaction(fn () => $this->service->save($request->validated()));

        return (new ManufacturerListResource($savedProduct))
            ->response()
            ->setStatusCode(HttpResponse::HTTP_CREATED);
    }

    /**
     * Returns specified product type
     *
     * @param \App\Models\Manufacturer $manufacturer
     * @return \App\Http\Resources\ManufacturerListResource
     */
    public function show(Manufacturer $manufacturer): ManufacturerListResource
    {
        return new ManufacturerListResource($manufacturer);
    }
}
