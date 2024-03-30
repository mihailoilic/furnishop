<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $data = [];

    public function __construct()
    {


        $this->data["menu"] =
            Menu::whereNull("parent")
            ->with("menus")
            ->get();

        $this->data["categories"] = Category::whereNull("parent_id")
            ->with("subcategories")
            ->get();

    }

    public function author(){
        return view("front.pages.author", $this->data);
    }


}
