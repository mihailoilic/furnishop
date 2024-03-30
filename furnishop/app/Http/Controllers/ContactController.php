<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessageRequest;
use App\Mail\ContactForm;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends BaseController
{

    public function index(){

        return view("front.pages.contact", $this->data);

    }

    public function sendMessage(SendMessageRequest $request){

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        try {
            Mail::to("furnishopinfo@gmail.com")->send(new ContactForm($name, $email, $subject, $message));

            return redirect()->route("contact")->with([
                "msg"=>"Message successfully sent",
                "class" => "success"
            ]);

        }
        catch(\Throwable $ex){

            Log::create(["ip"=>request()->ip(), "log_category_id"=>5, "message"=>substr($ex->getMessage(),0, 250)]);

            return redirect()->route("contact")->with([
                "msg"=>"Internal error. Please try again later.",
                "class" => "danger"
            ]);

        }



    }

}
