<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ColorProduct extends Pivot
{
    protected $guarded = ["id"];
}
