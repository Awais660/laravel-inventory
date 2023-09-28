<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\{Category,product,user,admin};

use Illuminate\Http\Request;

class users extends Controller
{
    public function user()
    {
        $cat = Category::all();
            return view('user.index', compact("cat"));
    }

    public function about()
    {
        $cat = Category::all();
            return view('user.about', compact("cat"));
    }

    public function blog()
    {
        $cat = Category::all();
            return view('user.blog', compact("cat"));
    }

    public function cart()
    {
        $cat = Category::all();
            return view('user.cart', compact("cat"));
    }
    
    public function cat()
    {
        $cat = Category::all();
            return view('user.category', compact("cat"));
    }

    public function checkout()
    {
        $cat = Category::all();
            return view('user.checkout', compact("cat"));
    }

    public function contact()
    {
        $cat = Category::all();
            return view('user.contact', compact("cat"));
    }

    public function dashboard()
    {
        $cat = Category::all();
            return view('user.dashboard', compact("cat"));
    }

    public function forgot()
    {
        $cat = Category::all();
            return view('user.forgot-password', compact("cat"));
    }

    public function UserLogin()
    {
        $cat = Category::all();
            return view('user.login', compact("cat"));
    }

    public function frontProduct($id)
    {
        $pro = product::where("pid",$id)->first();
        $size = DB::table('products')->join('product_attrs', 'product_attrs.ap_id', '=', 'products.pid')->select('product_attrs.size')->distinct()->where('products.pid', $id)->get();
        
        $color = DB::table('products')->join('product_attrs', 'product_attrs.ap_id', '=', 'products.pid')->select('product_attrs.color')->distinct()->where('products.pid', $id)->where('product_attrs.size',$size[0]->size)->get();
        

        $cat = Category::all();
            return view('user.product-variable',["cat"=>$cat , "pro"=>$pro, "size"=>$size, "color"=>$color]);
    }
    public function shop()
    {
        $cat = Category::all();
        $product = product::paginate(6);
            return view('user.shop',compact("cat","product"));
    }

    public function single()
    {
        $cat = Category::all();
            return view('user.single', compact("cat"));
    }

    public function subcat()
    {
        $cat = Category::all();
            return view('user.subcat', compact("cat"));
    }

    public function wishlist()
    {
        $cat = Category::all();
            return view('user.wishlist', compact("cat"));
    }

    public function change(request $req)
    {

        $color = DB::table('products')->join('product_attrs', 'product_attrs.ap_id', '=', 'products.pid')->distinct('product_attrs.color')->where('products.pid', $req->id)->where('product_attrs.size',$req->change)->get();

        $a=unserialize($color[0]->image);
        

        return response()->json([
            "data"=>$color,
            "image"=>$a[0],
        ]);
    }
     
    public function addcart(request $req)
    {
        
    }

    function login(Request $req)
    {
        $req->validate([
            "email"=>'required',
            "password"=>'required',
        ]);
        $email = $req->email;
        $password = $req->password;
        $data = user::where("email", "=", $email)->where("password", "=", $password)->first();
        if ($data) {
            session()->put("useremail", $email);
            return redirect("shop");
        } else {
            $data1 = admin::where("email", "=", $email)->where("password", "=", $password)->first();
            if ($data1) {
                session()->put("adminemail", $email);
                return view('admin.index');
            } else {
                return redirect("userLogin")->with("errormsg", "email password not correct");
            }
        }
    }

    function userLogout()
    {
            session()->pull("useremail");
            return redirect("userLogin");
    }
}
