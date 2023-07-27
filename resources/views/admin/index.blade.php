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
					<div class="row">
						<div class="col-12 col-lg-4">
							<div class="card radius-15 overflow-hidden">
								<div class="card-body">
									<div class="d-flex">
										<div>
											<p class="mb-0 font-weight-bold">Sessions</p>
											<h2 class="mb-0">501</h2>
										</div>
										<div class="ms-auto align-self-end">
											<p class="mb-0 font-14 text-primary"><i class='bx bxs-up-arrow-circle'></i>  <span>1.01% 31 days ago</span>
											</p>
										</div>
									</div>
									<div id="chart1"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-4">
							<div class="card radius-15 overflow-hidden">
								<div class="card-body">
									<div class="d-flex">
										<div>
											<p class="mb-0 font-weight-bold">Visitors</p>
											<h2 class="mb-0">409</h2>
										</div>
										<div class="ms-auto align-self-end">
											<p class="mb-0 font-14 text-success"><i class='bx bxs-up-arrow-circle'></i>  <span>0.49% 31 days ago</span>
											</p>
										</div>
									</div>
									<div id="chart2"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-4">
							<div class="card radius-15 overflow-hidden">
								<div class="card-body">
									<div class="d-flex">
										<div>
											<p class="mb-0 font-weight-bold">Page Views</p>
											<h2 class="mb-0">2,346</h2>
										</div>
										<div class="ms-auto align-self-end">
											<p class="mb-0 font-14 text-danger"><i class='bx bxs-down-arrow-circle'></i>  <span>130.68% 31 days ago</span>
											</p>
										</div>
									</div>
									<div id="chart3"></div>
								</div>
							</div>
						</div>
					</div>
					<!--end row-->
					<div class="row">
						<div class="col-12 col-lg-8 d-flex">
							<div class="card radius-15 w-100">
								<div class="card-header border-bottom-0">
									<div class="d-flex align-items-center">
										<div>
											<h5 class="mb-lg-0">New VS Returning Visitors</h5>
										</div>
										<div class="ms-auto mb-2 mb-lg-0">
											<div class="btn-group-round">
												<div class="btn-group">
													<button type="button" class="btn btn-white">This Month</button>
													<button type="button" class="btn btn-white dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="javaScript:;">This Week</a>
														<a class="dropdown-item" href="javaScript:;">This Year</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div id="chart4"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-4 d-flex">
							<div class="card radius-15 w-100">
								<div class="card-body">
									<div class="d-lg-flex align-items-center">
										<div>
											<h5 class="mb-4">Devices of Visitors</h5>
										</div>
									</div>
									<div id="chart5"></div>
								</div>
								<ul class="list-group list-group-flush mb-0">
									<li class="list-group-item border-top d-flex justify-content-between align-items-center bg-transparent">Mobile<span class="badge bg-danger rounded-pill">25%</span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Desktop<span class="badge bg-primary rounded-pill">65%</span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Tablet<span class="badge bg-warning rounded-pill text-dark">10%</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
	   <x-footer />
	<script>
		new PerfectScrollbar('.dashboard-social-list');
		new PerfectScrollbar('.dashboard-top-countries');
	</script>