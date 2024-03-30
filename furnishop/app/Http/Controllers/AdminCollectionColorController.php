<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateCollectionCategoryRequest;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Log;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminCollectionColorController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $show = $request->show ?? "collection";

        $items = null;
        if($show == "collection"){
            $items = Collection::query();
        }
        else {
            $items = Color::query();
        }

        $column = "name";
        $order = "asc";

        $sort = request("sort");
        if($sort){
            $column = explode("-", $sort)[0];
            $order = explode("-", $sort)[1];
        }

        $items = $items->orderBy($column, $order);

        $this->data["items"] = $items->paginate(10);
        $this->data["show"] = $show;


        return view("admin.pages.collections_colors.collections_colors", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.collections_colors.collections_colors_create", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreateCollectionCategoryRequest $request)
    {
        $table = $request->table;
        $name = $request->name;

        $msg = "Item created successfully";
        $class = "info";

        try {

            if($table == "collections") {
                Collection::create(["name"=>$name]);
            }
            else {
                Color::create(["name"=>$name]);
            }

        }
        catch(\Throwable $ex){

                Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);

                $msg = "Internal error";
                $class = "danger";
            }


        return redirect()->route("admin_collection_color.index")->with([
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
        $table = request("table");
        if(!$table){
            return redirect()->route("admin_collection_color.index")->with([
                "message" => "Bad parameters",
                "class" => "danger"
            ]);
        }

        $msg = "The item has been successfully removed";
        $class = "info";

        try {
            if($table == "collection"){

                $item = Collection::find($id);
            }
            else {
                $item = Color::find($id);
            }

            if(!$item){
                $msg = "Item not found";
                $class = "danger";
            }
            else {

                $existingProducts = Product::whereHas($table, function($q) use ($item ,$table){
                    $q->where(trim($table, "s")."_id", $item->id);
                })->count();

                if($existingProducts) {

                    $msg = "There are products assigned to this item";
                    $class = "danger";
                }
                else {
                    $item->delete();
                }

            }

        }
        catch(\Throwable $ex){

            Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);

            $msg = "Internal error";
            $class = "danger";
        }


        return redirect()->route("admin_collection_color.index")->with([
            "message" => $msg,
            "class" => "$class"
        ]);
    }
}
