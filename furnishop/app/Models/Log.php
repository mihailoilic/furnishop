<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $guarded = ["id"];

    use HasFactory;

    public function category(){
        return $this->belongsTo(LogCategory::class, "log_category_id", "id");
    }


}
