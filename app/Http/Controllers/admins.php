<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\order;
use Illuminate\Http\Request;

class admins extends Controller
{
    
    function logout()
    {
            session()->pull("adminemail");
            return redirect("Login");
    }

    function order()
    {
        $data = order::all();
        return view("admin.order", compact("data"));
    }

    function orderDel($id)
    {
        
        $order=order::find($id);
        $order->delete();
        return response()->json([
            'msg' => 1,
        ]);
    }

    function approved(Request $request)
    {
        
        $data = order::find($request->id);
    
            if($data->feedback=="1"){
                order::where('id', $request->id)->update([
                    'status' => 0
                ]);
                
                return response()->json([
                'msg' => 1,
            ]);
            }else{
                order::where('id', $request->id)->update([
                    'status' => 1
                ]);
                
                return response()->json([
                'msg' => 1,
            ]);
            }
    }
    
}