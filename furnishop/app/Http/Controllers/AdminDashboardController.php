<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEditFeaturedCategory;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDashboardController extends AdminController
{
    public function index(){

        $this->data["featuredCategory"] = Storage::get("featured_category.txt");

        $this->data["categories"] = Category::whereNull("parent_id")
            ->get();

        $this->data["productCount"] = Product::where("active", true)->count();
        $this->data["userCount"] = User::where("role_id", 1)->count();
        $this->data["inCart"] = Cart::sum("quantity");

        return view("admin.pages.dashboard", $this->data);
    }

    public function changeFeaturedCategory(AdminEditFeaturedCategory $request){

        Storage::put("featured_category.txt", "{$request->category}");

        return redirect()->route("admin")->with([
            "message" => "Featured category has been successfully changed",
            "class" => "info"
        ]);

    }

}
