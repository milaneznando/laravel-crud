<?php

namespace App\Http\Requests;

use App\Models\ProductType;
use App\Support\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ProductListRequest extends BaseRequest
{
    /**
     * Request rules
     *
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'product_name' => ['sometimes', 'required', 'string']
        ];
    }
}
