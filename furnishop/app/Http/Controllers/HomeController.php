<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lookbook;
use App\Models\Product;
use App\Models\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends BaseController
{
    public function index(){

        $this->data["sliderImages"] = SliderImage::all();


        $featuredCategoryId = Storage::get("featured_category.txt");;

        $this->data["featuredCategory"] =
            Category::find($featuredCategoryId);

        $this->data["featuredSubcategories"] =  $this->data["categories"]
            ->where("id", $featuredCategoryId)->first()
            ->subcategories;


        $this->data["featuredCategoryLatest"] =
            Product::whereHas("categories", function($q)
                use($featuredCategoryId){
                    $q->where("parent_id", $featuredCategoryId);
                })
                ->where("active", true)
                ->with("images")
                ->orderBy("created_at", "desc")
                ->take(6)
                ->get();

        $this->data["featuredCategoryBest"] =
            Product::whereHas("categories", function($q)
                use($featuredCategoryId){
                    $q->where("parent_id", $featuredCategoryId);
                })
                ->where("active", true)
                ->with("images")
                ->take(6)
                ->get();

        $this->data["featuredCategoryLookbook"] =
            Lookbook::where("category_id", $featuredCategoryId)
                ->take(2)
                ->get();



        $this->data["featuredLookbook"] =
            Lookbook::take(4)
            ->get();








        return view("front.pages.home", $this->data);


    }
}
