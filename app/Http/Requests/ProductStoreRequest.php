<?php

namespace App\Http\Requests;

use App\Models\ProductType;
use App\Support\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends BaseRequest
{
    /**
     * Request rules
     *
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'product_type_id' => ['required', 'integer', Rule::exists(ProductType::class, 'id')],
            'product_name' => ['required', 'string'],
            'product_price' => ['required', 'numeric', 'gt:0']
        ];
    }
}
