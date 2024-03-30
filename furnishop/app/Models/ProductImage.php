<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductImage extends Pivot
{
    protected $guarded = ["id"];
}
