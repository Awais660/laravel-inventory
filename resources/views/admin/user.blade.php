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
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Users</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">View Users</li>
								</ol>
							</nav>
						</div>
					</div>
					<!--end breadcrumb-->
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">View Users</h4>
							</div>
							<hr/>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
                                            <th>Number</th>
											<th>Country</th>
                                            <th>State</th>
											<th>City</th>
											<th>Created</th>
											<th>Update</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $fet) 
										<tr>
											<td>{{$fet['name']}}</td>
											<td>{{$fet['email']}}</td>
                                            <td>{{$fet['number']}}</td>
											<td>{{$fet['country']}}</td>
                                            <td>{{$fet['state']}}</td>
											<td>{{$fet['city']}}</td>
											<td>{{$fet['created_at']}}</td>
											<td><a class='btn btn-success' href="{{url('/permission/'.$fet['id'])}}">Permission</a></td>
                                            <td><button type='button' data-del="{{$fet['id']}}" class='del btn btn-danger'>Delete</button></td>
										</tr>
										@endforeach
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
	<script>
		$(document).ready(function () {
			//Default data table
			$('#example').DataTable();
			var table = $('#example2').DataTable({
				lengthChange: false,
				buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6]
                    }
                },
                {
                    extend: 'colvis',
                }]
			});
			table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
		});
	
	</script>
	<script>
	  $(document).on("click", ".del", function () {

var del = $(this).data("del");
var msg = this;
$.ajaxSetup({
  headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
$.ajax({
  url: "/dashboardUser/" + del,
  method: "DELETE",
  success: function (res) {
	if (res.msg == 1) {
		Lobibox.notify('success', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Data has been deleted.'
	});
	$(msg).closest("tr").fadeOut();
	}
}
})
  }
});
});
		</script>
		<script src="{{asset('sweatalerts/alerts.js')}}"></script>