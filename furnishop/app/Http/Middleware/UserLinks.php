<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserLinks
{
    public $authMenu = [
        [
            "class"=>"fa fa-check",
            "name"=>"View Cart",
            "route"=>"cart.index"
        ],
        [
            "class"=>"fa fa-sign-out",
            "name"=>"Sign Out",
            "route"=>"logout"
        ]
    ];

    public $noAuthMenu = [
        [
            "class"=>"fa fa-sign-in",
            "name"=>"Sign In",
            "route"=>"login"
        ],
        [
            "class"=>"fa fa-user",
            "name"=>"Register Account",
            "route"=>"register"
        ]
    ];


    public function handle(Request $request, Closure $next)
    {

        if(session()->has("user")){


            if(session()->get("user")->role->name == "Administrator"){

                $this->authMenu[] = [
                    "class" => "fa fa-cogs",
                    "name" => "Admin Panel",
                    "route" => "admin"
                ];
            }

            view()->share("accName", session()->get("user")->first_name);
            view()->share("accMenu", $this->authMenu);

        }
        else {

            view()->share("accName", "Guest");
            view()->share("accMenu", $this->noAuthMenu);

        }


        return $next($request);
    }
}
