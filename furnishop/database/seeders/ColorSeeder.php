<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    private $colors = [
        [
            "name"=>"Gray"
        ],
        [
            "name"=>"White"
        ],
        [
            "name"=>"Black"
        ],
        [
            "name"=>"Navy Blue"
        ],
        [
            "name"=>"Beige"
        ]

    ];

    public function run()
    {
        foreach($this->colors as $color){
            Color::create($color);
        }
    }
}
