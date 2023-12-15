@extends("layout.add")
@section("title","Porto - Bootstrap eCommerce Template")
@section("main")

        <main class="main main-test">
            <div class="container checkout-container">
                <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                    <li>
                        <a href="cart.html">Shopping Cart</a>
                    </li>
                    <li class="active">
                        <a href="checkout.html">Checkout</a>
                    </li>
                    <li class="disabled">
                        <a href="#">Order Complete</a>
                    </li>
                </ul>

                <div class="row">
                    <div class="col-lg-7">
                        <ul class="checkout-steps">
                            <li>
                                <h2 class="step-title">Billing details</h2>

                                <form id="data" name="myform">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> name
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control" required />
                                            </div>
                                        
                                           
                                        </div>
                                    </div>

                                    <div class="select-custom">
                                        <label>Country / Region
                                            <abbr class="required" title="required">*</abbr></label>
                                        <select name="country" id="country" class="form-control">
                                            <option value="pk" selected="selected">Pakistan
                                            </option>
                                            <option value="in">India</option>
                                            
                                        </select>
                                    </div>

                                    <div class="form-group mb-1 pb-2">
                                        <label>Street address
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="address1" id="address1" class="form-control"  value="{{$user->address1}}" placeholder="House number and street name" required />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control"  value="{{$user->address2}}" name="address2" id="address2" placeholder="Apartment, suite, unite, etc. (optional)" required />
                                    </div>

                             

                                    <div class="select-custom">
                                        <label>Town / City <abbr class="required" title="required">*</abbr></label>
                                        <select name="city" id="city" class="form-control">
                                            <option value="pb" selected="selected">Punjab</option>
                                            <option value="sn">sindh</option>
                                            
                                        </select>
                                    </div>

                                    <div class="select-custom">
                                        <label>State / County <abbr class="required" title="required">*</abbr></label>
                                        <select name="state" id="state" class="form-control">
                                            <option value="fsd" selected="selected">faisalabad</option>
                                            <option value="lr">Lahore</option>
                                            
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Postcode / Zip
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" id="code" name="code"  value="{{$user->code}}" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Phone <abbr class="required" title="required">*</abbr></label>
                                        <input type="tel" id="number" name="number" value="{{$user->number}}" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Email address
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control" required />
                                    </div>
                                
                            </li>
                        </ul>
                    </div>
                    <!-- End .col-lg-8 -->

                    <div class="col-lg-5">
                        <div class="order-summary">
                            <h3>YOUR ORDER</h3>

                            <table class="table table-mini-cart">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product-col">
                                            <h3 class="product-title">
                                                Circled Ultimate 3D Speaker ×
                                                <span class="product-qty">4</span>
                                            </h3>
                                        </td>

                                        <td class="price-col">
                                            <span>$1,040.00</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="product-col">
                                            <h3 class="product-title">
                                                Fashion Computer Bag ×
                                                <span class="product-qty">2</span>
                                            </h3>
                                        </td>

                                        <td class="price-col">
                                            <span>$418.00</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <td>
                                            <h4>Subtotal</h4>
                                        </td>

                                        <td class="price-col">
                                            <span>{{$total}}</span>
                                        </td>
                                    </tr>
                                    

                                    <tr class="order-total">
                                        <td>
                                            <h4>Total</h4>
                                        </td>
                                        <td>
                                            <b class="total-price"><span>{{$total}}</span></b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="payment-methods">
                                <h4 class="">Payment methods</h4>
                               
                                <input type="hidden" name="stripe_price" id="stripe_price" class="form-control" value="{{$total}}" required />

                                <input type="hidden" name="stripeToken" id="stripeToken" class="form-control" value="" required />

                                <input type="hidden" name="key" id="key" class="form-control" value="{{ env('STRIPE_KEY') }}" required />


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div id="card_number">
                                                <label> Card Number
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text" maxlength="i6" autocomplete='off' name="card_number" class="form-control card_number" required />
                                                <b><span class="formerror" style="color:red"></span></b>
                                            </div>
                                            </div>
                                        
                                           
                                        </div>
                                    </div>

                                    @php
                            $year = date('Y');
                            $year = substr( $year, -2);
                        @endphp

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div id="cvc_number">
                                                <label> CVC
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text" autocomplete='off' name="cvc_number"
                                                placeholder='ex. 311' maxlength="4" class="form-control cvc_number" required />
                                                <b><span class="formerror" style="color:red"></span></b>
                                            </div>
                                            </div>
                                        
                                           
                                        </div>

                                        <div class="col-md-3">
                                            <div class="select-custom">
                                                <div id="exp_month">
                                                <label>Month
                                                    <abbr class="required" title="required">*</abbr></label>
                                                <select name="exp_month" class="form-control exp_month">
                                                    <option value="" selected>MM</option>
                                                    @for ($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}">
                                                        {{ date('m', mktime(0, 0, 0, $i, 10)) }}
                                                    </option>
                                                @endfor
                                                    
                                                </select>
                                                <b><span class="formerror" style="color:red"></span></b>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="select-custom">
                                                <div id="exp_year">
                                                <label>Year
                                                    <abbr class="required" title="required">*</abbr></label>
                                                <select name="exp_year" class="form-control exp_year">
                                                    <option value="" selected>YY</option>
                                                    @for ($i = $year; $i <= $year + 10; $i++)
                                                <option value="{{ $i }}">{{ $i }}
                                                </option>
                                            @endfor
                                                    
                                                </select>
                                                <b><span class="formerror" style="color:red"></span></b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                            <button type="submit" id="checkout" class="btn btn-dark btn-place-order" form="checkout-form">
                                Place order
                            </button>
                        </div>
                    </form>
                        <!-- End .cart-summary -->
                    </div>
                    <!-- End .col-lg-4 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->
        </main>
        <!-- End .main -->

        @endsection
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>

function clearErrors(){

errors = document.getElementsByClassName('formerror');
for(let item of errors)
{
    item.innerHTML = "";
}}


        function seterror(id, error){
            element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;
        }



        $(document).ready(function(){
   $("#checkout").on("click",function(g){
       g.preventDefault();

       var returnval=true;
           
           clearErrors();
           
           /// end img
           var card_number = document.forms['myform']["card_number"].value;
    
    if (card_number.search(/^[0-9]*$/) ==-1){
        seterror("card_number", "*not use alphabathes");
        returnval = false;
            }

            if (card_number.length!=16){
        seterror("card_number", "*Length should be equal to 16");
        returnval = false;
            }

            var cvc_number = document.forms['myform']["cvc_number"].value;

            if (cvc_number.search(/^[0-9]*$/) ==-1){
        seterror("cvc_number", "*not use alphabathes");
        returnval = false;
            }

            if (cvc_number.length!=4){
        seterror("cvc_number", "*Length should be equal to 4");
        returnval = false;
            }

            var exp_month = document.forms['myform']["exp_month"].value;

            if (exp_month.length==""){
        seterror("exp_month", "exp_month  is required");
        returnval = false;
            }

            var exp_year = document.forms['myform']["exp_year"].value;

            if (exp_year.length==""){
        seterror("exp_year", "exp_year is required");
        returnval = false;
            }

            if(returnval==true){
    //    var formdata=new FormData(data);
    var email = $("#email").val();
     var name = $("#name").val();
     var country = $("#country").val();
     var address1 = $("#address1").val();
     var address2 = $("#address2").val();
     var city = $("#city").val();
     var state = $("#state").val();
     var code = $("#code").val();
     var number = $("#number").val();
     var stripe_price = $("#stripe_price").val();
     var key = $("#key").val();
     var card_number = $(".card_number").val();
     var cvc_number = $(".cvc_number").val();
     var exp_month = $(".exp_month").val();
     var exp_year = $(".exp_year").val();

     if (card_number != '' && cvc_number != '' && exp_month != '' && exp_year != '') {
                if(card_number.length == 16 && (cvc_number.length >= 3 || cvc_number.length <= 4 )){
                    Stripe.setPublishableKey(key);
                    Stripe.createToken({
                        number: card_number,
                        cvc: cvc_number,
                        exp_month: exp_month,
                        exp_year: exp_year
                    }, stripeResponseHandler);
                }
            }


            function stripeResponseHandler(status, response) {
            if (response.error) {
                console.log(response.error.message);
            } else {
                var token = response['id'];
                $("#stripeToken").val(token);
          
       
      $.ajax({
        url: "{{ url('checkouts') }}",
	type: "POST",
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	},
	// data:formdata,
    data: {
		email: email,
		name: name,
        country: country,
		address1: address1,
        address2: address2,
		city: city,
        state: state,
		code: code,
        number: number,
        stripe_price: stripe_price,
        stripeToken: token,
        card_number: card_number,
        cvc_number: cvc_number,
		exp_month: exp_month,
        exp_year: exp_year,
	},
        success:function(res){
            // alert(res);
            if(res.msg==1){
                Swal.fire({
              toast:true,
            icon:'success',
            title:'Order success',
            animation:false,
            position: 'top-right',
            showConfirmButton: false,
            timer:3000,
            timeProgressBar:true,
            didOpen:(toast)=>{
              toast.addEventListener('mouseenter',Swal.stopTimer)
              toast.addEventListener('mouseenter',Swal.resumeTimer)
            }
           });
setTimeout(anim,1000);
                    function anim(){
                        window.location.href="{{ url('shop') }}";
             }
            }
             else if(res.msg==2){
                
                

                Swal.fire({
              toast:true,
            icon:'error',
            title:'out of stock',
            animation:false,
            position: 'top-right',
            showConfirmButton: false,
            timer:3000,
            timeProgressBar:true,
            didOpen:(toast)=>{
              toast.addEventListener('mouseenter',Swal.stopTimer)
              toast.addEventListener('mouseenter',Swal.resumeTimer)
            }
           });
             }
            
        },
      });

    }
        }
    }
    
    return returnval;
   });
});
        //  load_cart_item_number();
    </script>

