<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    private $categories = [

        ["name"=>"Bedroom", "parent_id"=>null, "image"=>"bed.png"],
        ["name"=>"Dining Room", "parent_id"=>null, "image"=>"coffee_table.png"],
        ["name"=>"Living Room", "parent_id"=>null, "image"=>"sofa.png"],
        ["name"=>"Kitchen", "parent_id"=>null, "image"=>"kitchen.png"],
        ["name"=>"Bathroom", "parent_id"=>null, "image"=>"bathroom.png"],
        ["name"=>"Outdoor Spaces", "parent_id"=>null, "image"=>"armchair.png"],
        ["name"=>"Decor", "parent_id"=>null, "image"=>"vase-flower.png"],
        ["name"=>"Lighting", "parent_id"=>null, "image"=>"floor_lamp.png"],

        ["name"=>"Nightstands", "parent_id"=>1],
        ["name"=>"Dressers", "parent_id"=>1], //10
        ["name"=>"Beds", "parent_id"=>1],

        ["name"=>"Tables", "parent_id"=>2],
        ["name"=>"Chairs", "parent_id"=>2],
        ["name"=>"Bar Stools", "parent_id"=>2],

        ["name"=>"Sofa Accessories", "parent_id"=>3],
        ["name"=>"Armchairs", "parent_id"=>3],
        ["name"=>"Shelving Units", "parent_id"=>3],
        ["name"=>"Sofas", "parent_id"=>3],
        ["name"=>"Sofa Beds", "parent_id"=>3],
        ["name"=>"Side Tables", "parent_id"=>3],//20
        ["name"=>"Rugs", "parent_id"=>3],

        ["name"=>"Tableware", "parent_id"=>4],
        ["name"=>"Drinkware", "parent_id"=>4],
        ["name"=>"Utensils", "parent_id"=>4],

        ["name"=>"Laundry Baskets", "parent_id"=>5],
        ["name"=>"Soap Dispensers", "parent_id"=>5],

        ["name"=>"Outdoor Sofas", "parent_id"=>6],
        ["name"=>"Coffee Tables", "parent_id"=>6],

        ["name"=>"Vases", "parent_id"=>7],
        ["name"=>"Gallery", "parent_id"=>7], //30

        ["name"=>"Floor Lamps", "parent_id"=>8],
        ["name"=>"Pendants", "parent_id"=>8],

    ];


    public function run()
    {
        foreach($this->categories as $cat){

            Category::create($cat);
        }
    }
}
