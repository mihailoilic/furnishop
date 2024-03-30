<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    private $catProd = [
        ["product_id"=>1, "category_id"=>10],
        ["product_id"=>2, "category_id"=>9],
        ["product_id"=>3, "category_id"=>18],
        ["product_id"=>4, "category_id"=>16],
        ["product_id"=>5, "category_id"=>20],
        ["product_id"=>5, "category_id"=>28],
        ["product_id"=>6, "category_id"=>30],
        ["product_id"=>7, "category_id"=>21],
        ["product_id"=>8, "category_id"=>27],
        ["product_id"=>9, "category_id"=>27],
        ["product_id"=>10, "category_id"=>28],
        ["product_id"=>11, "category_id"=>28],
    ];

    public function run()
    {
        foreach($this->catProd as $cp){
            CategoryProduct::create($cp);
        }
    }
}
