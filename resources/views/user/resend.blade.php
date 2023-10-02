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
									Resend
								</li>
							</ol>
						</div>
					</nav>

					<h1>Resend</h1>
				</div>
			</div>

			<div class="container login-container">
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<div class="row">
							<div class="col-md-3">
							</div>
							<div class="col-md-6">
								
								<div class="heading mb-1">
									<h2 class="title">Resend</h2>
								</div>
								<div class="mb-2">
								<a href="{{url('sendMail')}}"><button class="btn btn-primary">Send</button></a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</main><!-- End .main -->
@endsection