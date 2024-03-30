<?php

namespace Database\Seeders;

use App\Models\LogCategory;
use Illuminate\Database\Seeder;

class LogCategorySeeder extends Seeder
{

    private $logCats = [
        [
            "name"=>"User Registration"
        ],
        [
            "name"=>"User Login"
        ],
        [
            "name"=>"User Logout"
        ],
        [
            "name"=>"Item Added To Cart"
        ],
        [
            "name"=>"Error"
        ],
    ];

    public function run()
    {
        foreach($this->logCats as $cat){
            LogCategory::create($cat);
        }
    }
}
