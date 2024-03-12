<?php

namespace App\Http\Requests;

use App\Models\ProductType;
use App\Support\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends BaseRequest
{
    /**
     * Request rules
     *
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'product_type_id' => ['sometimes', 'required', Rule::exists(ProductType::class, 'id')],
            'product_name' => ['sometimes', 'required', 'string'],
            'product_price' => ['sometimes', 'required', 'numeric', 'gt:0']
        ];
    }

    /**
     * Get data to be validated from the request
     *
     * @return array
     */
    public function data(): array
    {
        return $this->validated();
    }
}
