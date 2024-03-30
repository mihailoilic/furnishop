<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function colors(){
        return $this->belongsToMany(Color::class);
    }
    public function collection(){
        return $this->belongsTo(Collection::class);
    }

    public function images(){

        return $this->belongsToMany(Image::class, "product_image");
    }

    public function firstImage(){
        return $this->belongsToMany(Image::class, "product_image")->first();
    }
    public function categories(){
        return $this->belongsToMany(Category::class);

    }

}
