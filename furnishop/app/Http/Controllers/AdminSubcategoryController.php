<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateSubcategoryRequest;
use App\Models\Category;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSubcategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["mainCategories"] =
            Category::whereNull("parent_id")
            ->get();

        $categories = Category::whereNotNull("parent_id");

        $main = request("main-category");
        if($main){
            $categories = $categories->where("parent_id", $main);
        }



        $keywords = request("keywords");
        if($keywords){
            $categories = $categories->where("name", "like", "%$keywords%");
        }

        $column = "created_at";
        $order = "desc";

        $sort = request("sort");
        if($sort){
            $column = explode("-", $sort)[0];
            $order = explode("-", $sort)[1];
        }

        $categories = $categories->orderBy($column, $order);

        $this->data["subcategories"] =
            $categories
                ->with("mainCategory")
                ->paginate(10);




        return view("admin.pages.subcategories.subcategories", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["mainCategories"] =
            Category::whereNull("parent_id")
                ->get();


        return view("admin.pages.subcategories.subcategory_create", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreateSubcategoryRequest $request)
    {
        $msg = "Successfully created subcategory";
        $class = "info";

        try {

            Category::create([
                "parent_id"=>$request->main,
                "name"=>$request->name
            ]);


        }
        catch(\Throwable $ex){

            Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);

            $msg = "Internal error";
            $class = "danger";
        }


        return redirect()->route("admin_subcategory.index")->with([
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

        $msg = "Category successfully removed";
        $class = "info";

        $cat = Category::whereNotNull("parent_id")
            ->find($id);

        if(!$cat){
            $msg = "Category not found";
            $class = "danger";
        }
        else if(count($cat->products)){

            $msg = "There are products assigned to this category";
            $class = "danger";

        }
        else {


            try {

                $cat->delete();


            }
            catch(\Throwable $ex){
                Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);

                $msg = "Internal error";
                $class = "danger";
            }

        }


        return redirect()->route("admin_subcategory.index")->with([
            "message" => $msg,
            "class" => "$class"
        ]);



    }
}
