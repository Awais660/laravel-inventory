<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class admins extends Controller
{
    
    function logout()
    {
            session()->pull("adminemail");
            return redirect("Login");
    }
    
}