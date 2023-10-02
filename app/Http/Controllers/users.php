<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\{Category,product,user,admin};

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

    public function registerView(request $req)
    {
        $cat = Category::all();
        return view('user.register', compact("cat"));
    }

    public function register(request $req)
    {
        $req->validate([
            "name"=>'required',
            "email"=>'required|string|email|unique:users,email|max:255',
            "password"=>'required|string|confirmed',
            "password_confirmation"=>'required|string',
        ]);
        $name = $req->name;
        $email = $req->email;
        $password = Hash::make($req->password);
        $user = new user;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $save=$user->save();
        if ($save) {
            session()->put("useremail", $email);
            return redirect("sendMail");
        }else {
            return redirect("userLogin")->with("errormsg", "can't insert");
        }
    }

    public function login(Request $req)
{
    $req->validate([
        "email" => 'required|string|email|max:255',
        "password" => 'required|string',
    ]);

    $email = $req->email;
    $user = User::where('email', $email)->first();
    $admin = Admin::where('email', $email)->first();

    if ($user && Hash::check($req->password, $user->password)) {
        session()->put("useremail", $email);
        return redirect("shop");
    } elseif ($admin && Hash::check($req->password, $admin->password)) {
        session()->put("adminemail", $email);
        return view('admin.index');
    } else {
        return redirect("userLogin")->with("errormsg", "Email or password is incorrect");
    }
}
    function userLogout()
    {
            session()->pull("useremail");
            return redirect("userLogin");
    }

    public function verifyEmail()
    {
        $email=Session('useremail');
        $user = User::where('email', $email)->first();
            if($user->email_verified_at == false){
                $cat = Category::all();
                return view('user.resend', compact("cat"));
        } else {
            return redirect("shop");
        }
    }

    function sendMail()
    {
        $email=Session('useremail');
        Mail::send('user.must-verify',[],function($message) use ($email){
            $message->to($email);
            $message->subject('Verify Email');
        });
        return redirect("resend");
    }

    public function verified()
    {
        $email=Session('useremail');
        $user = user::where('email',$email)->first();
        $user->email_verified_at = Carbon::now();
        $updated=$user->update();
        if($updated){
            return redirect("shop");
        }
    }

    public function resend()
    {
        $cat = Category::all();
        return view('user.resend', compact("cat"));
    }

}
