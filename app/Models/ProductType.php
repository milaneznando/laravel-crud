<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductType extends BaseModel
{
    /**
     * Define the table name
     *
     * @var string
     */
    protected $table = 'product_type';

    /** Primary key attribute
     * @var string
     */
    protected $primaryKey = 'id';

    /** The attributes that are mass assignable
     * @var string[]
     */
    protected $fillable = [
        'product_type_name'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
