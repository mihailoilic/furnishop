<?php

namespace Database\Seeders;

use App\Models\LookbookItem;
use Illuminate\Database\Seeder;

class LookbookItemSeeder extends Seeder
{
    private $lookbookItems = [

        [
            "lookbook_id"=>1,
            "product_id"=>3,
            "position_x"=>60,
            "position_y"=>50
        ],
        [
            "lookbook_id"=>1,
            "product_id"=>4,
            "position_x"=>10,
            "position_y"=>70
        ],
        [
            "lookbook_id"=>1,
            "product_id"=>5,
            "position_x"=>40,
            "position_y"=>60
        ],
        [
            "lookbook_id"=>1,
            "product_id"=>6,
            "position_x"=>60,
            "position_y"=>10
        ],
        [
            "lookbook_id"=>1,
            "product_id"=>7,
            "position_x"=>40,
            "position_y"=>85
        ],


        [
            "lookbook_id"=>2,
            "product_id"=>8,
            "position_x"=>70,
            "position_y"=>65
        ],
        [
            "lookbook_id"=>2,
            "product_id"=>9,
            "position_x"=>58,
            "position_y"=>55
        ],
        [
            "lookbook_id"=>2,
            "product_id"=>10,
            "position_x"=>50,
            "position_y"=>70
        ],
        [
            "lookbook_id"=>2,
            "product_id"=>11,
            "position_x"=>40,
            "position_y"=>60
        ],



    ];


    public function run()
    {
        foreach($this->lookbookItems as $lbitem){
            LookbookItem::create($lbitem);
        }
    }
}
