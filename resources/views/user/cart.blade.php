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
									<tr class="product-row">
										<td>
											<figure class="product-image-container">
												<a href="product.html" class="product-image">
													<img src="assets/images/products/product-4.jpg" alt="product">
												</a>

												<a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
											</figure>
										</td>
										<td class="product-col">
											<h5 class="product-title">
												<a href="product.html">Men Watch</a>
											</h5>
										</td>
										<td>$17.90</td>
										<td>
											<div class="product-single-qty">
												<input class="horizontal-quantity form-control" type="text">
											</div><!-- End .product-single-qty -->
										</td>
										<td class="text-right"><span class="subtotal-price">$17.90</span></td>
									</tr>
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
												<button type="submit" class="btn btn-shop btn-update-cart">
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
										<td>$17.90</td>
									</tr>

									<tr>
										<td>Shipping</td>
										<td>Free</td>
									</tr>

								</tbody>

								<tfoot>
									<tr>
										<td>Total</td>
										<td>$17.90</td>
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