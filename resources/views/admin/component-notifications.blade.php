<x-header />
<body>
	<!-- wrapper -->
	<div class="wrapper">
	<x-aside />
	<x-nav />
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!--breadcrumb-->
					<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Components</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">Notifications</li>
								</ol>
							</nav>
						</div>
						<div class="ms-auto">
							<div class="btn-group">
								<button type="button" class="btn btn-primary">Settings</button>
								<button type="button" class="btn btn-primary bg-split-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">	<a class="dropdown-item" href="javascript:;">Action</a>
									<a class="dropdown-item" href="javascript:;">Another action</a>
									<a class="dropdown-item" href="javascript:;">Something else here</a>
									<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
								</div>
							</div>
						</div>
					</div>
					<!--end breadcrumb-->
					<div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h5 class="mb-0">Default Notifications</h5>
							</div>
							<hr/>
							<div class="row row-cols-auto g-3">
								<div class="col">
									<button type="button" class="btn btn-dark px-5" onclick="default_noti()">Default</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-info px-5" onclick="info_noti()"><i class="bx bx-info-circle me-1"></i> Info</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-warning px-5" onclick="warning_noti()"><i class="bx bx-error me-1"></i> Warning</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-danger px-5" onclick="error_noti()"><i class="bx bx-x-circle me-1"></i> Danger</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-success px-5" onclick="success_noti()"><i class="bx bx-check-circle me-1"></i> Success</button>
								</div>
							</div>
							<!--End Row-->
						</div>
						<div class="card-body">
							<div class="card-title">
								<h5 class="mb-0">Rounded corners Notifications</h5>
							</div>
							<hr/>
							<div class="row row-cols-auto g-3">
								<div class="col">
									<button type="button" class="btn btn-dark px-5" onclick="round_default_noti()">Default</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-info px-5" onclick="round_info_noti()"><i class="bx bx-info-circle me-1"></i>Info</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-warning px-5" onclick="round_warning_noti()"><i class="bx bx-error me-1"></i>Warning</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-danger px-5" onclick="round_error_noti()"><i class="bx bx-x-circle me-1"></i> Danger</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-success px-5" onclick="round_success_noti()"><i class="bx bx-check-circle me-1"></i>Success</button>
								</div>
							</div>
							<!--End Row-->
						</div>
						<div class="card-body">
							<div class="card-title">
								<h5 class="mb-0">Notifications With image</h5>
							</div>
							<hr/>
							<div class="row row-cols-auto g-3">
								<div class="col">
									<button type="button" class="btn btn-dark px-5" onclick="img_default_noti()">Default</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-info px-5" onclick="img_info_noti()"><i class="bx bx-info-circle me-1"></i>Info</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-warning px-5" onclick="img_warning_noti()"><i class="bx bx-error me-1"></i>Warning</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-danger px-5" onclick="img_error_noti()"><i class="bx bx-x-circle me-1"></i> Danger</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-success px-5" onclick="img_success_noti()"><i class="bx bx-check-circle me-1"></i>Success</button>
								</div>
							</div>
							<!--End Row-->
						</div>
						<div class="card-body">
							<div class="card-title">
								<h5 class="mb-0">Alternative position</h5>
							</div>
							<hr/>
							<div class="row row-cols-auto g-3">
								<div class="col">
									<button type="button" class="btn btn-dark px-5" onclick="pos1_default_noti()">Default</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-info px-5" onclick="pos2_info_noti()"><i class="bx bx-info-circle me-1"></i>Info</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-warning px-5" onclick="pos3_warning_noti()"><i class="bx bx-error me-1"></i>Warning</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-danger px-5" onclick="pos4_error_noti()"><i class="bx bx-x-circle me-1"></i> Danger</button>
								</div>
								<div class="col">
									<button type="button" class="btn btn-success px-5" onclick="pos5_success_noti()"><i class="bx bx-check-circle me-1"></i>Success</button>
								</div>
							</div>
							<!--End Row-->
						</div>
					</div>
					<div class="card radius-15">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">Notification With Animation</h4>
							</div>
							<hr/>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Show Class</th>
											<th>Out Class</th>
											<th>Example</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>fadeInDown</td>
											<td>fadeOutDown</td>
											<td>
												<button class="btn btn-dark" onclick="anim1_noti()">Show me</button>
											</td>
										</tr>
										<tr>
											<td>bounceIn</td>
											<td>bounceOut</td>
											<td>
												<button class="btn btn-info" onclick="anim2_noti()"><i class='bx bx-info-circle me-1'></i>Show me</button>
											</td>
										</tr>
										<tr>
											<td>zoomIn</td>
											<td>zoomOut</td>
											<td>
												<button class="btn btn-warning" onclick="anim3_noti()"><i class='bx bx-error me-1'></i>Show me</button>
											</td>
										</tr>
										<tr>
											<td>lightSpeedIn</td>
											<td>lightSpeedOut</td>
											<td>
												<button class="btn btn-danger" onclick="anim4_noti()"><i class='bx bx-x-circle me-1'></i> Show me</button>
											</td>
										</tr>
										<tr>
											<td>rollIn</td>
											<td>rollOut</td>
											<td>
												<button class="btn btn-success" onclick="anim5_noti()"><i class='bx bx-check-circle me-1'></i>Show me</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
	   <x-footer />
