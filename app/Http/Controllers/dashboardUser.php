<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class dashboardUser extends Controller
{
    
    public function dashboardUser()
    {
        $data = user::all();
        return view("admin.user", compact("data"));
    }

    public function userDelete($sid)
    {
            $user = user::find($sid);
            $user->delete();
            return response()->json([
                'msg' => 1,
            ]);
    }

    public function editUser($id)
    {
        $data = user::find($id);
        return view("admin.userPermission", compact("data"));
    }

    public function permission(Request $request)
    {
        $data = user::find($request->id);
        if($request->type=="feedback"){
            if($data->feedback=="1"){
                user::where('id', $request->id)->update([
                    'feedback' => 0
                ]);
                
                return response()->json([
                'msg' => 1,
            ]);
            }else{
                user::where('id', $request->id)->update([
                    'feedback' => 1
                ]);
                
                return response()->json([
                'msg' => 1,
            ]);
            }
        }else{
            if($data->comment=="1"){
                user::where('id', $request->id)->update([
                    'comment' => 0
                ]);
                
                return response()->json([
                'msg' => 1,
            ]);
            }else{
                user::where('id', $request->id)->update([
                    'comment' => 1
                ]);
                
                return response()->json([
                'msg' => 1,
            ]);
            }
        }
        return view("admin.userPermission", compact("data"));
    }
}
