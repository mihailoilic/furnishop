<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;

class ProductController extends BaseController
{

    public function index(Category $category = null, Request $request)
    {



        if($request->ajax()){

            $products = Product::where("active", true);


            if($category){
                $products = $products->whereHas("categories", function($q)
                use ($category)
                {
                    $q->where("parent_id", $category->id)
                        ->orWhere("category_id", $category->id);
                });
            }

            $keywords = request("keywords");
            if($keywords){
                $products = $products
                    ->where("name", "LIKE", "%$keywords%");
            }

            $collections = request("collections");
            if($collections){
                $products = $products
                    ->whereIn("collection_id", $collections);
            }

            $colors = request("colors");
            if($colors){
                $products = $products
                    ->whereHas("colors", function($q) use($colors){
                        $q->whereIn("color_id", $colors);
                    });
            }

            $sort = request("sort");
            if($sort){
                $column = explode("-", $sort)[0];
                $order = explode("-", $sort)[1];
                $products = $products
                    ->orderBy($column, $order);
            }


            $products = $products
                ->with("colors")
                ->with("images")
                ->paginate(6);


            return response()
                ->json($products)
                ->header("Vary", "Accept");

        }




        $this->data["collections"] = Collection::all();
        $this->data["colors"] = Color::all();
        $this->data["category"] = $category;


        return view("front.pages.products.shop", $this->data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =
            Product::find($id);

        if(!$product){
            return redirect()->route("error", ["code"=>404]);
        }

        $this->data["active"] = $product->active;

        $product =
            Product::where("id", $id)
            ->with("images")
            ->with("categories")
            ->with("collection")
            ->with("colors")
            ->first();


        $mainCategory =  $product
            ->categories
            ->first()
            ->mainCategory()
            ->first();

        $this->data["related"] =
            Product::whereHas("categories", function($q) use($mainCategory){
                    $q->where("parent_id", $mainCategory->id);
                })
                ->where("id", "<>", $id)
                ->with("images")
                ->take(3)
                ->get();


        $this->data["main_category"] = $mainCategory;
        $this->data["product"] =  $product;

        return view("front.pages.products.product", $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
