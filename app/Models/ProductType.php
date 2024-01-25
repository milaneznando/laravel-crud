<?php

namespace App\Models;

class ProductType extends BaseModel
{
    /** Primary key attribute
     * @var string
     */
    protected $primaryKey = 'id';

    /** The attributes that are mass assignable
     * @var string[]
     */
    protected $fillable = [
        'product_name'
    ];
}
