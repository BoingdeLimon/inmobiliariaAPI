<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use Illuminate\Contracts\Support\ValidatedData;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showMessagesByUser(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id' 
        ]);
        $user_id = $validatedData['user_id'];
        $messages = Messages::where('user_id', $user_id)->get();
        return response()->json(["status" => "success", "messages" => $messages], 200);
    }
    public function showAllMessages()
    {
       $messages = Messages::all();
        return response()->json(["status" => "success", "messages" => $messages], 200);
    }
    

    
    /**
     * Show the form for creating a new resource.
     */
    public function newMessage(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'required|string|max:500', 
            'user_id' => 'required|exists:users,id' 
        ]);

        $message = Messages::create($validatedData);

        if (!$message) {
            return response()->json(["status" => "error"], 500); 
        }

        return response()->json(["status" => "success", "message" => $message], 201); 
    }
    /**
     * Remove the specified resource from storage.
     */
    public function deleteMessage(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:messages,id' 
        ]);
        $id = $validatedData['id'];
        $message = Messages::find($id);
        if (!$message) {
            return response()->json(["status" => "error", "message" => "Message not found"], 404);
        }
        $message->delete();
        return response()->json(["status" => "success", "message" => "Message deleted successfully"], 200); 
    }
    
}
