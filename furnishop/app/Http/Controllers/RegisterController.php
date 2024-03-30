<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends BaseController
{
    public function index(){

        return view("front.pages.auth.register", $this->data);

    }

    public function store(RegisterRequest $request)
    {
        try {

        User::create([
            "first_name"=>request("firstname"),
            "last_name"=>request("lastname"),
            "email"=>request("email"),
            "password"=>md5(request("password"))
        ]);

        $email = request("email");

        Log::create(["ip"=>request()->ip(), "log_category_id"=>1, "message"=>$email." has registered."]);

        return redirect()->route("login")->with("message","Successful registration, you can sign in.");


        }
        catch(\Throwable $ex){
            Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);
            return redirect()->route("register")->with("message","Internal error");

        }


    }
}
