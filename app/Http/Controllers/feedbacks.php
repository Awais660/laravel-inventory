<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use App\Models\comment;
use App\Models\user;
use Illuminate\Http\Request;

class feedbacks extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'review' => 'required',
        ]);

        $email=session()->get("useremail");
        $select=user::where('email',$email)->first();
        $feed = new feedback;
        $feed->user_id = $select->id;
        $feed->post_id = $request->input('post');
        $feed->title = $request->input('title');
        $feed->category = $request->input('category');
        $feed->review = $request->input('review');
        $feed->rating = $request->input('rating');
        $save=$feed->save();

        return response()->json([
            'status' => 1,
        ]);
 
        return response()->json([
            'status' => 2,
        ]); 
    
    }

    public function showfeedback(Request $request)
    {
        $email=session()->get("useremail");
        $permission=user::where('email', $email)->first();
        $feedback = Feedback::with('comments')->where('post_id', $request->post_id)->paginate(10);
  
        return response()->json([
            'html' => view('user.feedback', [
                'feedbacks' => $feedback,
                'post_id' => $request->post_id,
                'permissions' => $permission,
            ])->render(),
        ]);
    }

    public function delete(Request $request)
    {
        
        if($request->type=="comment"){
            $comment = comment::find($request->id);
            $done=$comment->delete();
            if($done){
            return response()->json([
                'msg' => 1,
            ]);
        }
        }else{
        
            $feed = feedback::find($request->id);
            $done=$feed->delete();
            if($done){
            return response()->json([
                'msg' => 1,
            ]);

            $comment = comment::where("feedback_id",$request->id)->get();
            $comment->delete();
        }
            
        
}
    }
}
