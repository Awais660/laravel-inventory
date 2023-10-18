@extends("layout.add")
@section("title","Porto - Bootstrap eCommerce Template")
@section("main")

		<main class="main">
			<div class="page-header">
				<div class="container d-flex flex-column align-items-center">
					<nav aria-label="breadcrumb" class="breadcrumb-nav">
						<div class="container">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{url('user')}}">Home</a></li>
								<li class="breadcrumb-item"><a href="{{url('cat')}}">Shop</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									Login Account
								</li>
							</ol>
						</div>
					</nav>

					<h1>Login Account</h1>
				</div>
			</div>

			<div class="container login-container">
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<div class="row">
							<div class="col-md-3">
							</div>
							<div class="col-md-6">
								@if (session("msg")!="")
                            <div class="alert alert-success" role="alert">
                                    <strong>{{session("msg") }}</strong>
                            </div>
                            @endif

								@if (session("errormsg")!="")
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{session("errormsg") }}</strong>
                            </div>
                            @endif
								<div class="heading mb-1">
									<h2 class="title">Login</h2>
								</div>

								<form action="{{url('/user')}}" method="POST">
									@csrf
									<label for="login-email">
										Username or email address
										<span class="required">*</span>
									</label>
									<input type="email" name="email"  class="form-input form-wide" id="login-email" required />
									@error('email')
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{$message}}</strong>
                            </div>
                            @enderror

									<label for="login-password">
										Password
										<span class="required">*</span>
									</label>
									<input type="password" name="password" class="form-input form-wide" id="login-password" required />
									@error('password')
									<div class="alert alert-danger" role="alert">
											<strong>{{$message}}</strong>
									</div>
									@enderror

									<div class="form-footer">
										<div class="custom-control custom-checkbox mb-0">
											<input type="checkbox" name="remember" class="custom-control-input" id="lost-password" />
											<label class="custom-control-label mb-0" for="lost-password">Remember
												me</label>
										</div>

										<a href="{{url('forgot')}}"
											class="forget-password text-dark form-footer-right">Forgot
											Password?</a>
									</div>
									<button type="submit" name="login" class="btn btn-dark btn-md w-100">
										LOGIN
									</button>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</main><!-- End .main -->
@endsection