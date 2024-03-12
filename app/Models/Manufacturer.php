<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manufacturer extends Model
{
    /**
     * Define the table name
     *
     * @var string
     */
    protected $table = 'manufacturer';

    /** Primary key attribute
     * @var string
     */
    protected $primaryKey = 'id';

    /** The attributes that are mass assignable
     * @var string[]
     */
    protected $fillable = [
        'manufacturer_name',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
