<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $data = [];

    public function __construct(){
        $this->data["menu"] = [
            [
                "icon" => "pe-7s-graph",
                "name"=>"Dashboard",
                "route"=>"admin"
            ],
            [
                "icon" => "pe-7s-note2",
                "name"=>"Logs",
                "route"=>"admin.log"
            ],
            [
                "icon" => "pe-7s-users",
                "name"=>"Users",
                "route"=>"admin_user.index"
            ],
            [
                "icon" => "pe-7s-notebook",
                "name"=>"Lookbook",
                "route"=>"admin_lookbook.index"
            ],
            [
                "icon" => "pe-7s-box2",
                "name"=>"Products",
                "route"=>"admin_product.index"
            ],
            [
                "icon" => "pe-7s-folder",
                "name"=>"Subcategories",
                "route"=>"admin_subcategory.index"
            ],
            [
                "icon" => "pe-7s-keypad",
                "name"=>"Collections & Colors",
                "route"=>"admin_collection_color.index"
            ],

        ];
    }

}
