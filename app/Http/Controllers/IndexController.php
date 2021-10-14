<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
class IndexController extends Controller
{
    public function index(){
        return view('layouts.vue');
    }

    public function sendMessage(Request $request){
        $this->validate($request,[
            'name' => 'required|max:100',
            'email' => 'required|email',
            'subject' => 'required|max:255|string',
            'message' => 'required|string'
        ]);

        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();
        return response()->json(['success'=>'the message has send seccussfully']);



        
    }
}
