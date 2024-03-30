<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateLookbookIdeaRequest;
use App\Http\Requests\AdminEditLookbookIdeaRequest;
use App\Models\Category;
use App\Models\Log;
use App\Models\Lookbook;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLookbookController extends AdminController
{

    public function index(Request $request){

        $this->data["categories"] = Category::whereNull("parent_id")
            ->get();

        $lookbook = Lookbook::with("category");

        $category= $request->category;
        if($category){
            $lookbook = $lookbook->where("category_id", $category);
        }

        $column = "created_at";
        $order = "desc";

        $sort = request("sort");
        if($sort){
            $column = explode("-", $sort)[0];
            $order = explode("-", $sort)[1];
        }

        $lookbook = $lookbook->orderBy($column, $order);

        $this->data["lookbook"] = $lookbook->paginate(10);




        return view("admin.pages.lookbook.lookbook", $this->data);
    }



    public function create()
    {
        $this->data["categories"] = Category::whereNull("parent_id")
            ->get();

        return view("admin.pages.lookbook.lookbook_create_idea", $this->data);
    }

    public function store(AdminCreateLookbookIdeaRequest $request){


        $newIdea = [
            "category_id" => $request->category,
            "name" => $request->name
        ];


        try {

            $image = $request->file("image");
            $newIdea["image"] = $image->store("", ["disk"=>"lookbook"]);

            $ideaObj = Lookbook::create($newIdea);


            return redirect()->route("admin_lookbook.edit", ["admin_lookbook"=>$ideaObj->id]);



        }
        catch(\Throwable $ex){

            Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);

            $msg = "Internal error";
            $class = "danger";
            $route = "admin_lookbook.index";

            return redirect()->route($route)->with([
                "message" => $msg,
                "class" => "$class"
            ]);
        }




    }

    public function destroy($id){

        $msg = "The lookbook idea has been successfully removed";
        $class = "info";

        try {

            $idea = Lookbook::find($id);

            if(!$idea){

                $msg = "Lookbook idea not found";
                $class = "danger";

            }
            else {

                $filename = $idea->image;

                $idea->items()->delete();
                $idea->delete();

                Storage::disk("lookbook")->delete($filename);

            }

        }
        catch(\Throwable $ex){

            Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);

            $msg = "Internal error";
            $class = "danger";
        }


        return redirect()->route("admin_lookbook.index")->with([
            "message" => $msg,
            "class" => "$class"
        ]);
    }

    public function edit($id){

        $idea = Lookbook::where("id", $id)
            ->with("items")
            ->first();

        if(!$idea){

            $msg = "Lookbook idea not found";
            $class = "danger";

            return redirect()->route("admin_lookbook.index")->with([
                "message" => $msg,
                "class" => "$class"
            ]);

        }

        $this->data["idea"] = $idea;

        return view("admin.pages.lookbook.lookbook_edit_idea", $this->data);

    }

    public function update(AdminEditLookbookIdeaRequest $request, $id){

        $idea = Lookbook::where("id", $id)
            ->first();




        if(!$idea){

            $msg = "Lookbook idea not found";
            $class = "danger";

            return redirect()->route("admin_lookbook.index")->with([
                "message" => $msg,
                "class" => "$class"
            ]);

        }

        $msg = "Lookbook idea updated successfully";
        $class = "info";

        try {

            $pins = $request->pins ?? [];
            $values = [];

            foreach($pins as $pin){

                $product_id = explode(",", $pin)[2];

                if(!Product::where("id", $product_id)->exists()){

                    return redirect()->route("admin_lookbook.edit", ["admin_lookbook"=>$id])->with([
                        "message" => "Product ID $product_id doesn't exist",
                        "class" => "danger"
                    ]);

                }

                $values[] = [
                    "lookbook_id"=>$idea->id,
                    "position_x"=>explode(",", $pin)[0],
                    "position_y"=>explode(",", $pin)[1],
                    "product_id"=>$product_id
                ];
            }

            $idea->items()->delete();
            $idea->items()->createMany($values);


        }
        catch(\Throwable $ex){

            Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);

            $msg = "Internal error";
            $class = "danger";
        }


        return redirect()->route("admin_lookbook.index")->with([
            "message" => $msg,
            "class" => "$class"
        ]);

    }


}
