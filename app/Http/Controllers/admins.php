<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class admins extends Controller
{
    public function login()
    {
        if (session()->has("adminemail")) {
            return view('admin.index');
        } else {
            return view("admin.authentication-login");
        }
    }
    
    function admin(Request $req)
    {
        $req->validate([
            "email"=>'required',
            "password"=>'required',
        ]);
        $email = $req->email;
        $password = $req->password;
        $data = admin::where("email", "=", $email)->where("password", "=", $password)->first();
        if ($data) {
            session()->put("adminemail", $email);
            return view('admin.index');
        } else {
            return redirect("login")->with("errormsg", "email password not correct");
        }
    }
    function logout()
    {
            session()->pull("adminemail");
            return redirect("userLogin");
    }
    
}