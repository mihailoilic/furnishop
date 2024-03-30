<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
    public function index(){
        return view("front.pages.auth.login", $this->data);
    }

    public function auth(LoginRequest $request){

        $user = User::where("email", request("email"))
            ->where("password", md5(request("password")))
            ->with("role")
            ->first();

        if(!$user){

            return redirect()->back()->with("error", "Wrong username and/or password.");

        }


        session()->put("user", $user);

        Log::create(["ip"=>request()->ip(), "log_category_id"=>2, "message"=>$user->email." has logged in."]);

        return redirect()->back();
    }

    public function logout(){
        $user = session()->get("user");
        Log::create(["ip"=>request()->ip(), "log_category_id"=>3, "message"=>$user->email." has logged out."]);

        session()->remove("user");
        return redirect()->back();
    }
}
