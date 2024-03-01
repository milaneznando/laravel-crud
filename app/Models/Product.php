<?php

namespace App\Models;

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
        'product_name',
        'product_price',
    ];
}
