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
									Register Account
								</li>
							</ol>
						</div>
					</nav>

					<h1>Register Account</h1>
				</div>
			</div>

			<div class="container login-container">
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<div class="row">
							
							<div class="col-md-12">
                                @if (session("errormsg")!="")
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{session("errormsg") }}</strong>
                            </div>
                            @endif
								<div class="heading mb-1">
									<h2 class="title">Register</h2>
								</div>

								<form action="{{url('/register')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
									<label for="name">
										Name
										<span class="required">*</span>
									</label>
									<input type="text" name="name" class="form-input form-wide" id="name" required />
                                    @error('name')
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{$message}}</strong>
                            </div>
                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label for="register-email">
                                                Email address
                                                <span class="required">*</span>
                                            </label>
                                            <input type="email" name="email" class="form-input form-wide" id="register-email" required />
                                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{$message}}</strong>
                            </div>
                            @enderror
                                    </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="register-password">
                                                Password
                                                <span class="required">*</span>
                                            </label>
                                            <input type="password" name="password" class="form-input form-wide" id="register-password"
                                                required />
                                                @error('password')
									<div class="alert alert-danger" role="alert">
											<strong>{{$message}}</strong>
									</div>
									@enderror
                                        </div>
                                    <div class="col-6">
                                        <label for="confirm_register-password">
                                            Confirm Password
                                            <span class="required">*</span>
                                        </label>
                                        <input type="password" name="password_confirmation" class="form-input form-wide" id="confirm_register-password"
                                            required />
                                            @error('password_confirmation')
									<div class="alert alert-danger" role="alert">
											<strong>{{$message}}</strong>
									</div>
									@enderror
                                    </div>
                                    </div>

									<div class="form-footer mb-2">
										<button type="submit" name="register" class="btn btn-dark btn-md w-100 mr-0">
											Register
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