<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lookbook;
use Illuminate\Http\Request;

class LookbookController extends BaseController
{
    public function index(Category $category = null){

        $lookbook = Lookbook::with("items.product.images");


        if($category){
            $lookbook = $lookbook->where("category_id", $category->id);
        }

        $this->data["lookbook"] = $lookbook->get();
        $this->data["selectedCategory"] = $category;
        $this->data["categories"] = Category::whereHas("lookbooks")->get();

        return view("front.pages.products.lookbook", $this->data);
    }
}
