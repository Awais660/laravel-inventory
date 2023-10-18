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
									My Account
								</li>
							</ol>
						</div>
					</nav>

					<h1>My Account</h1>
				</div>
			</div>

			<div class="container reset-password-container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
                        @if (session("errormsg")!="")
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{session("errormsg") }}</strong>
                            </div>
                            @endif
						<div class="feature-box border-top-primary">
							<div class="feature-box-content">
								<form class="mb-0" action="{{url('/passwordSubmit')}}" method="POST">
									@csrf
									<p>
										Lost your password? Please enter your new password.
									</p>
                                    <input type="hidden" value="{{$model}}" name="model" required />
									<input type="hidden" value="{{$id}}" name="id" required />
									<div class="form-group mb-0">
										<label for="password" class="font-weight-normal">Password</label>
										<input type="password" class="form-control" id="password" name="password" required />
                                        @error('passeord')
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{$message}}</strong>
									</div>
									@enderror
									</div>

                                    <div class="form-group mb-0">
										<label for="confirmPassword" class="font-weight-normal">Confirm Password</label>
										<input type="password" class="form-control" id="confirmPassword" name="password_confirmation" required />
                                        @error('password_confirmation')
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{$message}}</strong>
									</div>
									@enderror
									</div>

									<div class="form-footer mb-0">
										<a href="{{url('login')}}">Click here to login</a>

										<button type="submit"
											class="btn btn-md btn-primary form-footer-right font-weight-normal text-transform-none mr-0">
											Submit
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main><!-- End .main -->
@endsection