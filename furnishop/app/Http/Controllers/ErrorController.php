<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends BaseController
{
    public function index($code){

        $this->data["code"] = $code;
        return view("errors.error", $this->data);

    }
}
