<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEditUserRequest;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends AdminController
{

    public function index()
    {
        $users = User::where("role_id", 1);

        $keywords = request("keywords");
        if($keywords){
            $users = $users->where(function($q) use($keywords){
               $q->where(DB::raw("concat(first_name, ' ', last_name)"), "like", "%$keywords%")
                   ->orWhere("email", "like", "%$keywords%");
            });
        }

        $column = "created_at";
        $order = "desc";

        $sort = request("sort");
        if($sort){
            $column = explode("-", $sort)[0];
            $order = explode("-", $sort)[1];
        }

        $users = $users->orderBy($column, $order);

        $this->data["users"] = $users->paginate("10");


        return view("admin.pages.users.users", $this->data);
    }



    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        //
    }




    public function show($id)
    {
        //
    }






    public function edit($id)
    {

        $user = User::find($id);

        if(!$user){
            $msg = "User not found";
            $class = "danger";
            return redirect()->route("admin_user.index")->with([
                "message" => $msg,
                "class" => "$class"
            ]);
        }

        $this->data["user"] = $user;


        return view("admin.pages.users.user_edit", $this->data);
    }






    public function update(AdminEditUserRequest $request, $id)
    {
        $email = $request->email;

        $newInfo = [
            "email" => $email,
            "first_name"=>$request->first,
            "last_name"=>$request->last,
        ];

        $msg = "User successfully updated";
        $class = "info";


        try {

            $user = User::find($id);
            if(!$user){

                $msg = "User not found";
                $class = "danger";

            }
            else {

                $user->fill($newInfo);
                $user->save();

            }


        }
        catch(\Throwable $ex){

            Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);

            $msg = "Internal error";
            $class = "danger";
        }


        return redirect()->route("admin_user.index")->with([
            "message" => $msg,
            "class" => "$class"
        ]);




    }






    public function destroy($id)
    {


        $msg = "User successfully removed";
        $class = "info";

        $user = User::find($id);

        if(!$user){
            $msg = "User not found";
            $class = "danger";
        }
        else {

            try {

                $user->delete();


            }
            catch(\Throwable $ex){
                Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);

                $msg = "Internal error";
                $class = "danger";
            }

        }


        return redirect()->route("admin_user.index")->with([
           "message" => $msg,
            "class" => "$class"
        ]);
    }
}
