<?php

namespace App\Http\Requests;

use App\Models\ProductType;
use App\Support\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ProductTypeStoreRequest extends BaseRequest
{
    /**
     * Request rules
     *
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string']
        ];
    }
}
