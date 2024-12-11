<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function listAllComments()
    {
        return Comments::all();
    }

    public function createComment(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
            'id_rentals' => 'required|integer|exists:rentals,id',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        $comment = Comments::create([
            'comment' => $validatedData['comment'],
            'user_id' => $validatedData['user_id'],
            'id_rentals' => $validatedData['id_rentals'],
            'rating' => $validatedData['rating'],
        ]);
        if ($comment) {
            return response()->json([
                'status' => 'successfull',
                'comment' => $comment
            ], 201);
        } else {
            return response()->json([
                'status' => 'error'
            ], 500);
        }
    }
}
