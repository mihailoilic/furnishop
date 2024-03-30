<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lookbook extends Model
{
    protected $guarded = ["id"];
    use HasFactory;

    function items(){
        return $this->hasMany(LookbookItem::class);
    }

    function category(){
        return $this->belongsTo(Category::class);
    }

}
