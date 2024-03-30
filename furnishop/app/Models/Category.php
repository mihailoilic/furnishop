<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ["id"];


    public function subcategories(){
        return $this->hasMany(Category::class, "parent_id", "id")
            ->orderBy("name");
    }

    public function mainCategory(){
        return $this->belongsTo(Category::class, "parent_id", "id");
    }

    public function products(){

        return $this->belongsToMany(Product::class, "category_product");
    }

    public function lookbooks(){
        return $this->hasMany(Lookbook::class);
    }

}
