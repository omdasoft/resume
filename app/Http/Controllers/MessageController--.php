<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    //return all messages
    public function index(){
        $messages = Message::orderBy('created_at','desc')->paginate('10');
        return response()->json($messages);
    }

    //delete message
    public function delete(Request $request){
        
        Message::findOrFail($request->id)->delete();
        
        return response()->json(['message' => 'the message deleted successfully']);
    }
}
