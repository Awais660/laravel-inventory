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
									<label for="number">
										Phone Number
										<span class="required">*</span>
									</label>
									<input type="number" name="number" class="form-input form-wide" id="number" required />
                                    @error('number')
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{$message}}</strong>
                            </div>
                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label for="countryId">
                                                Country
                                                <span class="required">*</span>
                                            </label>
											<select name="country" class="form-control form-control-sm countries" id="countryId" required>
                                            <option value="">Select Country</option>
                                            <option value="pk">Pakistan</option>
                                            <option value="in">india</option>
											</select>
                                            @error('country')
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{$message}}</strong>
                            </div>
                            @enderror
                                    </div>
                                    </div>

									<div class="row">
                                        <div class="col-6">
                                            <label for="stateId">
                                                State
                                                <span class="required">*</span>
                                            </label>
											<select name="state" class="form-control form-control-sm states" id="stateId" required>
												<option value="">Select State</option>
												<option value="pb">punjab</option>
												<option value="sn">sindh</option>
											</select>
                                            @error('state')
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{$message}}</strong>
                            </div>
                            @enderror
                                    </div>

                                        <div class="col-6">
                                            <label for="cityId">
                                                City
                                                <span class="required">*</span>
                                            </label>
											<select name="city" class="form-control form-control-sm cities" id="cityId" required>
												<option value="">Select City</option>
												<option value="fsd">faisalabad</option>
												<option value="lr">lahore</option>
											</select>
                                            @error('city')
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{$message}}</strong>
                            </div>
                            @enderror
                                    </div>
                                    </div>

									<div class="row">
                                        <div class="col-6">
									<label for="address1">
										Address Line 1
										<span class="required">*</span>
									</label>
									<input type="text" name="address1" class="form-input form-wide" id="address1" required />
                                    @error('address1')
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{$message}}</strong>
                            </div>
                            @enderror
                                        </div>

                                        <div class="col-6">
                                            <label for="address2">
                                                Address Line 2
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" name="address2" class="form-input form-wide" id="address2" required />
                                            @error('address2')
                            <div class="alert alert-danger" role="alert">
                                    <strong>{{$message}}</strong>
                            </div>
                            @enderror
                                    </div>
                                    </div>

									<div class="row">
                                        <div class="col-6">
									<label for="code">
										Postal Code
										<span class="required">*</span>
									</label>
									<input type="number" name="code" class="form-input form-wide" id="code" required />
                                    @error('code')
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