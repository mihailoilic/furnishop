<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateProductRequest;
use App\Http\Requests\AdminCreateSubcategoryRequest;
use App\Http\Requests\AdminEditProductRequest;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Image;
use App\Models\Log;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["categories"] = Category::whereNull("parent_id")
            ->with("subcategories")
            ->get();


        $products = Product::where("active", true)
            ->with("images")
            ->with("colors")
            ->with("collection")
            ->with("categories");


        $category_id = request("category");
        if($category_id){
            $products = $products->whereHas("categories", function($q) use ($category_id){
                $q->where("category_id", $category_id)
                ->orWhere("parent_id", $category_id);
            });
        }

        $keywords = request("keywords");
        if($keywords){
            $products = $products->where("name", "like", "%$keywords%");
        }

        $column = "created_at";
        $order = "desc";

        $sort = request("sort");
        if($sort){
            $column = explode("-", $sort)[0];
            $order = explode("-", $sort)[1];
        }

        $products = $products->orderBy($column, $order);




        $this->data["products"] = $products->paginate(10);

        return view("admin.pages.products.products", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["categories"] = Category::whereNull("parent_id")
            ->with("subcategories")
            ->get();

        $this->data["colors"] = Color::all();
        $this->data["collections"] =  Collection::all();


        return view("admin.pages.products.product_create", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreateProductRequest $request)
    {
        $newProduct = [
            "name"=>$request->name,
            "price" => $request->price,
            "description" => $request->description,
            "collection_id" => $request->collection
        ];

        $subcats = $request->subcategories;
        $colors = $request->colors;


        $msg = "Successfully created product";
        $class = "info";

        try {
            DB::beginTransaction();

            $product = Product::create($newProduct);
            $product->categories()->sync($subcats);
            $product->colors()->sync($colors);

            foreach($request->file("images") as $i=>$image){

                if(!$image){
                    if($i == 0){

                        DB::rollBack();

                        return redirect()->route("admin_product.create")->with(["message"=>"First image must not be empty", "class" => "danger"]);
                    }
                    continue;
                }

                $filename = $image->store("", ["disk"=>"products"]);

                $image = Image::create([
                   "filename"=>$filename,
                   "thumbnail_filename"=>$filename
                ]);

                ProductImage::create([
                    "product_id"=>$product->id,
                    "image_id"=>$image->id
                ]);
            }

            DB::commit();

        }
        catch(\Throwable $ex){

            DB::rollBack();

            Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);

            $msg = "Internal error";
            $class = "danger";
        }


        return redirect()->route("admin_product.index")->with([
            "message" => $msg,
            "class" => "$class"
        ]);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where("id", $id)
            ->with("categories")
            ->with("colors")
            ->with("collection")
            ->first();

        if(!$product){

            return redirect()->route("admin_product.index")->with(["message"=>"Product not found", "class" => "danger"]);
        }

        $this->data["product"] = $product;

        $this->data["categories"] = Category::whereNull("parent_id")
            ->with("subcategories")
            ->get();

        $this->data["colors"] = Color::all();
        $this->data["collections"] =  Collection::all();



        return view("admin.pages.products.product_edit", $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminEditProductRequest $request, $id)
    {

        $newProduct = [
            "name"=>$request->name,
            "price" => $request->price,
            "description" => $request->description,
            "collection_id" => $request->collection
        ];

        $subcats = $request->subcategories;
        $colors = $request->colors;


        $msg = "Successfully edited product";
        $class = "info";

        try {

            $product = Product::find($id);

            if(!$product){
                return redirect()->route("admin_product.index")->with(["message"=>"Product not found", "class" => "danger"]);
            }

            DB::beginTransaction();

            $product->update($newProduct);
            $product->categories()->sync($subcats);
            $product->colors()->sync($colors);



            if($request->change_images){

                $images = $request->file("images");

                if(!$images){

                    DB::rollBack();

                    return redirect()->route("admin_product.edit", ["admin_product"=>$id])->with(["message"=>"First image must not be empty", "class" => "danger"])
                        ->withInput();
                }

                $newImages = [];

                foreach($images as $image){

                    if(!$image){
                        continue;
                    }

                    $filename = $image->store("", ["disk"=>"products"]);

                    $image = Image::create([
                        "filename"=>$filename,
                        "thumbnail_filename"=>$filename
                    ]);

                    $newImages[] = [
                        "product_id"=>$product->id,
                        "image_id"=>$image->id
                    ];
                }

                $product->images()->sync($newImages);
            }

            DB::commit();

        }
        catch(\Throwable $ex){

            DB::rollBack();

            Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);

            $msg = "Internal error";
            $class = "danger";
        }


        return redirect()->route("admin_product.index")->with([
            "message" => $msg,
            "class" => "$class"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msg = "The product has been successfully set inactive";
        $class = "info";

        try {

            $product = Product::find($id);

            if(!$product){
                $msg = "Product not found";
                $class = "danger";
            }
            else{
                $product->active = false;
                $product->save();
            }


        }
        catch(\Throwable $ex){

            Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);

            $msg = "Internal error";
            $class = "danger";
        }


        return redirect()->route("admin_product.index")->with([
            "message" => $msg,
            "class" => "$class"
        ]);
    }
}
