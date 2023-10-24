@extends("layout.add")
@section("title","Porto - Bootstrap eCommerce Template")
@section("main")

		<main class="main">
			<div class="container">
				<ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
					<li class="active">
						<a href="cart.html">Shopping Cart</a>
					</li>
					<li>
						<a href="checkout.html">Checkout</a>
					</li>
					<li class="disabled">
						<a href="cart.html">Order Complete</a>
					</li>
				</ul>

				<div class="row">
					<div class="col-lg-8">
						<div class="cart-table-container">
							<table class="table table-cart">
								<thead>
									<tr>
										<th class="thumbnail-col"></th>
										<th class="product-col">Product</th>
										<th class="price-col">Price</th>
										<th class="qty-col">Quantity</th>
										<th class="text-right">Subtotal</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($products as $product)
										
									
									<tr class="product-row">
										<input type="hidden" class="pcode" name="pcode"
                                    value="{{ $product->pcode }}">
									<input type="hidden" class="email" name="email"
                                    value="{{ $product->email }}">
									<input type="hidden" class="unit" name="unit"
                                    value="{{ $product->unit }}">
									<input type="hidden" class="srp" name="srp"
                                    value="{{ $product->srp }}">
										<td>
											<figure class="product-image-container">
												<a href="product.html" class="product-image">
													<img src="{{ '../images/' . $product->image }}" alt="product">
												</a>

												<a href="#" class="btn-remove icon-cancel" id="remove" title="Remove Product"></a>
											</figure>
										</td>
										<td class="product-col">
											<h5 class="product-title">
												<a href="product.html">{{$product->pname}}</a>
											</h5>
										</td>
										<td>{{$product->srp}}</td>
										<td>
											<div class="product-single-qty">
												<input class="horizontal-quantity form-control quantity" id="quantity" value="{{$product->pqty}}" type="text">
											</div><!-- End .product-single-qty -->
										</td>
										<td class="text-right"><span class="subtotal-price">{{$product->tsrp}}</span></td>
									</tr>
									@endforeach
								</tbody>


								<tfoot>
									<tr>
										<td colspan="5" class="clearfix">
											<div class="float-left">
												<div class="cart-discount">
													<form action="#">
														<div class="input-group">
															<input type="text" class="form-control form-control-sm"
																placeholder="Coupon Code" required>
															<div class="input-group-append">
																<button class="btn btn-sm" type="submit">Apply
																	Coupon</button>
															</div>
														</div><!-- End .input-group -->
													</form>
												</div>
											</div><!-- End .float-left -->

											<div class="float-right">
												<button type="submit" id="update" class="btn btn-shop btn-update-cart">
													Update Cart
												</button>
											</div><!-- End .float-right -->
										</td>
									</tr>
								</tfoot>
							</table>
						</div><!-- End .cart-table-container -->
					</div><!-- End .col-lg-8 -->

					<div class="col-lg-4">
						<div class="cart-summary">
							<h3>CART TOTALS</h3>

							<table class="table table-totals">
								<tbody>
									<tr>
										<td>Subtotal</td>
										<td>{{$total}}</td>
									</tr>

									<tr>
										<td>Shipping</td>
										<td>Free</td>
									</tr>

								</tbody>

								<tfoot>
									<tr>
										<td>Total</td>
										<td>{{$total}}</td>
									</tr>
								</tfoot>
							</table>

							<div class="checkout-methods">
								<a href="{{url('checkout')}}" class="btn btn-block btn-dark">Proceed to Checkout
									<i class="fa fa-arrow-right"></i></a>
							</div>
						</div><!-- End .cart-summary -->
					</div><!-- End .col-lg-4 -->
				</div><!-- End .row -->
			</div><!-- End .container -->

			<div class="mb-6"></div><!-- margin -->
		</main><!-- End .main -->

		@endsection
		<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function() {

		$(document).on("click", "#update", function(stop) {

stop.preventDefault();
location.reload(true);
		});

		$(document).on("change", "#quantity", function(stop) {

stop.preventDefault();
var form = $(this).closest(".product-row");
var qty = form.find(".quantity").val();
var email = form.find(".email").val();
var code = form.find(".pcode").val();
var unit = form.find(".unit").val();
var srp = form.find(".srp").val();

$.ajax({
	url: "{{ url('increase') }}",
	type: "POST",
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	},
	data: {
		pqty: qty,
		pemail: email,
		pcode: code,
		punit: unit,
		psrp: srp
	},
	success: function(res) {
		if (res.msg == 1) {
			location.reload(true);

		} else if (res.msg == 2) {
			Swal.fire({
				toast: true,
				icon: 'error',
				title: 'Could not increased',
				animation: false,
				position: 'top-right',
				showConfirmButton: false,
				timer: 3000,
				timeProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal
						.stopTimer)
					toast.addEventListener('mouseenter', Swal
						.resumeTimer)
				}

			})
		}
		else if (res.msg == 3) {
			Swal.fire({
				toast: true,
				icon: 'error',
				title: 'Out of stock',
				animation: false,
				position: 'top-right',
				showConfirmButton: false,
				timer: 3000,
				timeProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal
						.stopTimer)
					toast.addEventListener('mouseenter', Swal
						.resumeTimer)
				}

			})
		}
	}
});
});


$(document).on("click", "#remove", function(stop) {

stop.preventDefault();
var msg = this;
var form = $(this).closest(".product-row");
var email = form.find(".email").val();
var code = form.find(".pcode").val();

$.ajax({
	url: "{{ url('removeProduct') }}",
	type: "POST",
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	},
	data: {
		pemail: email,
		pcode: code,
	},
	success: function(res) {
		if (res.msg == 1) {
			$(msg).closest("tr").fadeOut();
			lSwal.fire({
				toast: true,
				icon: 'success',
				title: 'Removed',
				animation: false,
				position: 'top-right',
				showConfirmButton: false,
				timer: 3000,
				timeProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal
						.stopTimer)
					toast.addEventListener('mouseenter', Swal
						.resumeTimer)
				}

			});
			
		} else if (res.msg == 2) {
			Swal.fire({
				toast: true,
				icon: 'error',
				title: 'Could not removed',
				animation: false,
				position: 'top-right',
				showConfirmButton: false,
				timer: 3000,
				timeProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal
						.stopTimer)
					toast.addEventListener('mouseenter', Swal
						.resumeTimer)
				}

			})
		}
	}
});
});

	});
	</script>