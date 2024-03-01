<?php

namespace App\Http\Requests;

use App\Models\ProductType;
use App\Support\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ProductTypeUpdateRequest extends BaseRequest
{
    /**
     * Request rules
     *
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'product_type_name' => ['required', 'string']
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
