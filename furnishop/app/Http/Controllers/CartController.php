<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Log;
use Illuminate\Http\Request;

class CartController extends BaseController
{

    public function index()
    {

        $user = session()->get("user");
        if(!$user) {
            return redirect()->route("home");
        }

        $cart =
            Cart::where("user_id", $user->id)
                ->with("product.images")
                ->whereHas("product",function($q){
                    $q->where("active", true);
                })
                ->get();


        $totalPerProduct = [];
        $total = 0;

        foreach($cart as $item){
            $totalPerProduct[] = $item->product->price * $item->quantity;
            $total += $item->product->price * $item->quantity;
        }

        $this->data["totalPerProduct"] = $totalPerProduct;
        $this->data["total"] = $total;
        $this->data["cart"] = $cart;



        return view("front.pages.user.cart", $this->data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $user = session()->get("user");
        if(!$user){
            return response()->json(["success"=>false, "message"=>"Session expired."]);
        }

        $productId = request("product_id");
        $quantity = request("quantity");

        try {

            $existingItem = Cart::where("product_id", $productId)
                ->where("user_id", $user->id)
                ->first();

            if($existingItem) {
                $existingItem->quantity = $existingItem->quantity + $quantity;
                $existingItem->save();
            }
            else {
                Cart::create([
                    "product_id"=>$productId,
                    "user_id"=>$user->id,
                    "quantity" => $quantity
                ]);
            }

            Log::create(["ip"=>request()->ip(), "log_category_id"=>4, "message"=>$user->email." has added
            product ID $productId to cart."]);


        }
        catch(\Throwable $ex){

            Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>$ex->getMessage()]);

            return response()->json(["success"=>false, "message"=>"Internal error. Try again later."]);
        }

        return response()->json(["success"=>true, "message"=>"Successfully added to cart."]);




    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $user = session()->get("user");

        $quantity = request("quantity");

        try {

            $cart = Cart::find($id);

            if(!$cart || $cart->user_id != $user->id){
                return response()->json(["success"=>false, "message"=>"Error. Item not found."]);

            }

            $cart->quantity = $quantity;
            $cart->save();

            return response()->json(["success"=>true, "message"=>"Success."]);
        }
        catch(\Throwable $ex){

            return response()->json(["success"=>false, "message"=>"Internal error. Try again later."]);
        }
    }

    public function destroy($id)
    {
        $user = session()->get("user");


        try {

            $cart = Cart::find($id);

            if(!$cart || $cart->user_id != $user->id){
                return response()->json(["success"=>false, "message"=>"Error. Item not found."]);

            }

            $cart->delete();

            return response()->json(["success"=>true, "message"=>"Success."]);
        }
        catch(\Throwable $ex){

            return response()->json(["success"=>false, "message"=>"Internal error. Try again later."]);
        }
    }
}
