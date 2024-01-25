<?php

namespace App\Http\Requests;

use App\Models\ProductType;
use App\Support\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ProductTypeListRequest extends BaseRequest
{
    /**
     * Request rules
     *
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'id' => [
                'sometimes',
                'required',
                'integer',
                Rule::exists(ProductType::class, 'id')
            ]
        ];
    }

    /**
     * Get data to be validated from the request.
     */
    public function data()
    {
        return $this->validated();
    }
}
