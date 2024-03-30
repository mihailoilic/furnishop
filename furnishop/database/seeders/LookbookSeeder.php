<?php

namespace Database\Seeders;

use App\Models\Lookbook;
use Illuminate\Database\Seeder;

class LookbookSeeder extends Seeder
{

    private $lookbook = [
        [
            "name"  => "Scandinavian Style Living Room",
            "image" => "1685500.jpg",
            "category_id" => 3
        ],
        [
            "name"  => "Garden Living",
            "image" => "629622.jpg",
            "category_id" => 6
        ],
    ];


    public function run()
    {
        foreach($this->lookbook as $lb){
            Lookbook::create($lb);
        }
    }
}
