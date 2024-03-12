<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends BaseModel
{
    /**
     * Define the table name
     *
     * @var string
     */
    protected $table = 'product';

    /** Primary key attribute
     * @var string
     */
    protected $primaryKey = 'id';

    /** The attributes that are mass assignable
     * @var string[]
     */
    protected $fillable = [
        'product_type_id',
        'manufacturer_id',
        'product_name',
        'product_price',
    ];

    /**
     * Product Type relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productType(): HasOne
    {
        return $this->hasOne(ProductType::class);
    }

    /**
     * Manufacturers relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function manufacturer(): HasOne
    {
        return $this->hasOne(Manufacturer::class);
    }
}
