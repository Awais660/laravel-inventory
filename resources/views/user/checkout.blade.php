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

                                <form id="data">
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
                                </form>
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
                                    <tr class="order-shipping">
                                        <td class="text-left" colspan="2">
                                            <h4 class="m-b-sm">Shipping</h4>

                                            <div class="form-group form-group-custom-control">
                                                <div class="custom-control custom-radio d-flex">
                                                    <input type="radio" class="custom-control-input" name="radio" checked />
                                                    <label class="custom-control-label">Local Pickup</label>
                                                </div>
                                                <!-- End .custom-checkbox -->
                                            </div>
                                            <!-- End .form-group -->

                                            <div class="form-group form-group-custom-control mb-0">
                                                <div class="custom-control custom-radio d-flex mb-0">
                                                    <input type="radio" name="radio" class="custom-control-input">
                                                    <label class="custom-control-label">Flat Rate</label>
                                                </div>
                                                <!-- End .custom-checkbox -->
                                            </div>
                                            <!-- End .form-group -->
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
                                <div class="info-box with-icon p-0">
                                    <p>
                                        Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.
                                    </p>
                                </div>
                            </div>

                            <button type="submit" id="checkout" class="btn btn-dark btn-place-order" form="checkout-form">
                                Place order
                            </button>
                        </div>
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
    <script>
        $(document).ready(function(){
   $("#checkout").on("click",function(g){
       g.preventDefault();
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
            
        }
      });
   });
});
        //  load_cart_item_number();
    </script>