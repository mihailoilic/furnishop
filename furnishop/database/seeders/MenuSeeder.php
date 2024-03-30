<?php

namespace Database\Seeders;

use App\Http\Controllers\ProductController;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    private $menu = [
        [
            "parent"=>null,
            "name"=>"Home",
            "route"=>"home"
        ],
        [
            "parent"=>null,
            "name"=>"Shop",
            "route"=>"shop"
        ],
        [
            "parent"=>null,
            "name"=>"Lookbook",
            "route"=>"lookbook"
        ],
        [
            "parent"=>null,
            "name"=>"More",
            "route"=>null
        ],
        [
            "parent"=>4,
            "name"=>"Contact us",
            "route"=>"contact"
        ],
        [
            "parent"=>4,
            "name"=>"About author",
            "route"=>"author"
        ]
    ];




    public function run()
    {
        foreach($this->menu as $m){

            Menu::create($m);

        }

    }
}
