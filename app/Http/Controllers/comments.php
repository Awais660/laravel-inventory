<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\feedback;
use App\Models\user;

use Illuminate\Http\Request;

class comments extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'comment' => 'required',
        ]);

        $email=session()->get("useremail");
        $select=user::where('email',$email)->first();
        $comment = new comment;
        $comment->user_id = $select->id;
        $comment->feedback_id = $request->input('feed');
        $comment->post_id = $request->input('post');
        $comment->comment = $request->input('comment');
        $save=$comment->save();

        return response()->json([
            'status' => 1,
        ]);
 
        return response()->json([
            'status' => 2,
        ]); 
    
    }
}
