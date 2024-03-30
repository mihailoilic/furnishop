<?php

namespace Database\Seeders;

use App\Models\ColorProduct;
use Illuminate\Database\Seeder;

class ColorProductSeeder extends Seeder
{
    private $colProd = [
        ["product_id"=>1, "color_id"=>1],
        ["product_id"=>2, "color_id"=>1],
        ["product_id"=>3, "color_id"=>2],
        ["product_id"=>4, "color_id"=>5],
        ["product_id"=>5, "color_id"=>3],
        ["product_id"=>6, "color_id"=>5],
        ["product_id"=>7, "color_id"=>5],
        ["product_id"=>8, "color_id"=>1],
        ["product_id"=>9, "color_id"=>1],
        ["product_id"=>10, "color_id"=>3],
        ["product_id"=>11, "color_id"=>3],
    ];

    public function run()
    {
        foreach($this->colProd as $cp){
            ColorProduct::create($cp);
        }
    }
}
