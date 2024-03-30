<?php

namespace Database\Seeders;

use App\Models\Collection;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    private $collections = [
        ["name"=>"Bergamo"],
        ["name"=>"Charlotte"],
        ["name"=>"Lugano"],
        ["name"=>"Madrid"],
        ["name"=>"Kingston"],
        ["name"=>"Princeton"],
        ["name"=>"Rome"],
        ["name"=>"Sydney"],


    ];

    public function run()
    {
        foreach($this->collections as $collection){
            Collection::create($collection);
        }
    }
}
