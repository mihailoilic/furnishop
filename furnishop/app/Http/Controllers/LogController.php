<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\LogCategory;
use Illuminate\Http\Request;

class LogController extends AdminController
{
    public function index(){

        $category_id = request("category");

        $this->data["logCategories"] = LogCategory::all();

        $log = Log::with("category");

        if($category_id){
            $log = $log->where("log_category_id", $category_id);
        }

        $column = "created_at";
        $order = "desc";

        $sort = request("sort");
        if($sort){
            $column = explode("-", $sort)[0];
            $order = explode("-", $sort)[1];
        }

        $log = $log->orderBy($column, $order);


        $this->data["log"]=$log->paginate(10);




        return view("admin.pages.log", $this->data);
    }

}
