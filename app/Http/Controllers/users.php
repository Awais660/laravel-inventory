<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\{Category,product,product_attr,user,admin,add_cart,feedback,order,online_user};

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
        $email=session()->get("useremail");
        $cat = Category::all();
        $products = add_cart::all();
        $total = add_cart::where("email",$email)->sum('tsrp');
            return view('user.cart', compact("cat","products","total"));
    }
    
    public function cat()
    {
        $cat = Category::all();
            return view('user.category', compact("cat"));
    }

    public function checkout()
    {
        $email=session()->get("useremail");
        $user = user::where('email',$email)->first();
        $total = add_cart::where("email",$email)->sum('tsrp');
        $cat = Category::all();
            return view('user.checkout', compact("cat","user","total"));
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
        $email=session()->get("useremail");
        $permission=user::where('email', $email)->first();
        $feedback = Feedback::with('comments')->where('post_id', $id)->paginate(10);
        
        $pro = product::where("pid",$id)->first();
        $size = DB::table('products')->join('product_attrs', 'product_attrs.ap_id', '=', 'products.pid')->select('product_attrs.size')->distinct()->where('products.pid', $id)->get();
        
        $color = DB::table('products')->join('product_attrs', 'product_attrs.ap_id', '=', 'products.pid')->select('product_attrs.color')->distinct()->where('products.pid', $id)->where('product_attrs.size',$size[0]->size)->get();
        

        $cat = Category::all();
            return view('user.product-variable',["cat"=>$cat , "pro"=>$pro, "size"=>$size, "color"=>$color, "feedback"=>$feedback, "permission"=>$permission]);
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
        $email=session()->get("useremail");
        $exist = add_cart::where("pcode",$req->input('pcode'))->first();
        
        if($exist){
            return response()->json([
                'msg' => 3,
            ]);
        }else{
        if($req->input('pqty') < $req->input('pstock')){
        $tunit=$req->input('punit') * $req->input('pqty');
        $tsrp=$req->input('psrp') * $req->input('pqty');
        $add = new add_cart;
        $add->pname = $req->input('pname');
        $add->pdes = $req->input('pdes');
        $add->pqty = $req->input('pqty');
        $add->pcode = $req->input('pcode');
        $add->unit = $req->input('punit');
        $add->srp = $req->input('psrp');
        $add->tunit = $tunit;
        $add->tsrp = $tsrp;
        $add->size = $req->input('psize');
        $add->color = $req->input('pcolor');
        $add->image = $req->input('pimage');
        $add->email = $email;
        $save=$add->save();
        if ($save) {
            return response()->json([
                'msg' => 1,
            ]);
        }else {
            return response()->json([
                'msg' => 2,
            ]);
        }
    }else{
        return response()->json([
            'msg' => 5,
        ]);
    }
}
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
            "number"=>'required|numeric',
            "country"=>'required',
            "state"=>'required',
            "city"=>'required',
            "address1"=>'required',
            "address2"=>'required',
            "code"=>'required|numeric',
            "password"=>'required|string|confirmed',
            "password_confirmation"=>'required|string',
        ]);
        $name = $req->name;
        $email = $req->email;
        $number = $req->number;
        $country = $req->country;
        $state = $req->state;
        $city = $req->city;
        $address1 = $req->address1;
        $address2 = $req->address2;
        $code = $req->code;
        $password = Hash::make($req->password);
        
        $user = new user;
        $user->name = $name;
        $user->email = $email;
        $user->number = $number;
        $user->country = $country;
        $user->state = $state;
        $user->city = $city;
        $user->address1 = $address1;
        $user->address2 = $address2;
        $user->code = $code;
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
        // if(isset($req->remember)&&!empty($req->remember)){
        //     Cookie::make('email', $email, 120); 
        //     Cookie::make('password', $req->password, 120);
        // }else{
        //     Cookie::queue(Cookie::forget('email'));
        //     Cookie::queue(Cookie::forget('password'));
        // }
        session()->put("useremail", $email);
        return redirect("shop");
    } elseif ($admin && Hash::check($req->password, $admin->password)) {
        // if(isset($req->remember)&&!empty($req->remember)){
        //     Cookie::make('email', $email, 120); 
        //     Cookie::make('password', $req->password, 120);
        // }else{
        //     Cookie::queue(Cookie::forget('email'));
        //     Cookie::queue(Cookie::forget('password'));
        // }
        session()->put("adminemail", $email);
        return redirect("admin");
    } else {
        return redirect("Login")->with("errormsg", "Email or password is incorrect");
    }
}

function admin()
    {
        return view('admin.index');
    }
    function userLogout()
    {
            session()->pull("useremail");
            return redirect("Login");
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

    public function reset(request $req)
    {
        $req->validate([
            "email" => 'required|string|email|max:255',
        ]);
    
        $email = $req->email;
        $user = User::where('email', $email)->first();
        $admin = Admin::where('email', $email)->first();
        $randomNumber = rand(1000, 9999);
        $emailSubject = 'Code: ' . $randomNumber;

        // Get the current time
    $currentTime = Carbon::now();
    // Add 10 minutes to the current time
    $newTime = $currentTime->addMinutes(10);
    
        if ($user) {
            Mail::html('<p>Your verification code is: <strong>' . $randomNumber . '</strong></p>', function($message) use ($email, $emailSubject) {
                $message->to($email);
                $message->subject($emailSubject);
        });

        User::where('email', $email)->update([
            'reset_code' => $randomNumber,
            'exp_date' => $newTime,
        ]);
            return redirect("code");
        }elseif($admin){
            Mail::html('<p>Your verification code is: <strong>' . $randomNumber . '</strong></p>', function($message) use ($email, $emailSubject) {
                $message->to($email);
                $message->subject($emailSubject);
            });
    
            admin::where('email', $email)->update([
                'code' => $randomNumber,
                'exp_date' => $newTime,
            ]);
            return redirect("code");
        } else {
            return redirect("forgot")->with("errormsg", "Email is incorrect");
        }
    }

    public function code()
    {
        $cat = Category::all();
        return view('user.code', compact("cat"));
    }

    public function codeSubmit(request $req)
    {
        $req->validate([
            "code" => 'required|numeric',
        ]);
    
        $code = $req->code;
        $user = User::where('reset_code', $code)->first();
        $admin = Admin::where('code', $code)->first();
        
    
        if ($user) {
           $id=$user->id;
           return redirect("userResetPassword?id=$id");
        }elseif($admin){
            $id=$admin->id;
            return redirect("adminResetPassword?id=$id");
        } else {
            return redirect("code")->with("errormsg", "Code is incorrect");
        }
    }

    public function userResetPassword()
    {
        $id = request('id');
        $model="user";
        $cat = Category::all();
        return view('user.userResetPassword', compact('cat', 'model','id'));
    }

    public function adminResetPassword()
    {
        $id = request('id');
        $model="admin";
        $cat = Category::all();
        return view('user.adminResetPassword', compact('cat', 'model','id'));
    }


    public function passwordSubmit(request $req)
    {
        $req->validate([
            "password"=>'required|string|confirmed',
            "password_confirmation"=>'required|string',
        ]);
    
        $password = Hash::make($req->password);
        $model = $req->model;
        $id = $req->id;
    
        if ($model=="user") {
            User::where('id', $id)->update([
                'password' => $password,
                'reset_code' => "",
                'exp_date' => "",
            ]);
            return redirect("userLogin")->with("msg", "Your password is reset");
        }elseif($model=="admin"){
            admin::where('id', $id)->update([
                'password' => $password,
                'code' => "",
                'exp_date' => "",
            ]);
            return redirect("userLogin")->with("msg", "Your password is reset");
        
        } else {
            return redirect("code")->with("errormsg", "Can't reset password");
        }
    }


    public function increase(request $req)
    {
        $tunit=$req->pqty*$req->punit;
        $tsrp=$req->pqty*$req->psrp;
        
        $update=add_cart::where('pcode', $req->pcode)->where('email', $req->pemail)->update([
            'pqty' => $req->pqty,
            'tunit' => $tunit,
            'tsrp' => $tsrp,
        ]);

        if($update){
            return response()->json([
                'msg' => 1,
            ]);
        }else{
            return response()->json([
                'msg' => 2,
            ]);
        }
    }


    public function removeProduct(request $req)
    {
        $delete = add_cart::where('pcode',$req->pcode)->where('pcode',$req->pcode)->delete();
        if($delete){
            return response()->json([
                'msg' => 1,
            ]);
        }else{
            return response()->json([
                'msg' => 2,
            ]);
        }
    }

    public function checkoutSubmit(request $req)
    {
        $email=Session('useremail');

        $code='ORD-' . \Str::random(4);
        $user = new online_user;
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->number = $req->input('number');
        $user->country = $req->input('country');
        $user->state = $req->input('state');
        $user->city = $req->input('city');
        $user->address1 = $req->input('address1');
        $user->address2 = $req->input('address2');
        $user->postal = $req->input('code');
        $user->status = 0;
        $user->payment = 0;
        $user->order_no = $code;
        $save=$user->save();
        if($save){
            $emailSubject="Order number is " . $code;

            Mail::html('<p>Your order number is: <strong>' . $code . '</strong></p>', function($message) use ($email, $emailSubject) {
                $message->to($email);
                $message->subject($emailSubject);
            });

            $adds=add_cart::where('email',$req->input('email'))->get();
            
            foreach($adds as $add){
                $order = new order;
        $order->pname = $add->pname;
        $order->pdes = $add->pdes;
        $order->proprice = $add->unit;
        $order->proimage = $add->image;
        $order->quantity = $add->pqty;
        $order->tprice = $add->tsrp;
        $order->srp = $add->srp;
        $order->size = $add->size;
        $order->color = $add->color;
        $order->code = $add->pcode;
        $order->email = $add->email;
        $order->status = 0;
        $order->order = $code;
        $save=$order->save();

        $stock=product_attr::where('pcode', $add->pcode)->first();
        $new=$stock->stock-$add->pqty;

        product_attr::where('pcode', $add->pcode)->update([
            'stock' => $new,
        ]);
        
         $del=add_cart::where('email',$req->input('email'))->where('pcode',$add->pcode)->delete();
         if($del){
            $a=1;
         }
            }

            if($a==1){
            return response()->json([
                'msg' => 1,
            ]);
        }

        }else{
            return response()->json([
                'msg' => 2,
            ]);
        }
    }

}
