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
						<div class="breadcrumb-title pe-3">Orders</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">View Orders</li>
								</ol>
							</nav>
						</div>
						<div class="ms-auto">
							
						</div>
					</div>
					<!--end breadcrumb-->
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">View Orders</h4>
							</div>
							<hr/>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
                                            <th>Order No.</th>
											<th>Product Code</th>
											<th>Name</th>
											<th>Description</th>
                                            <th>Email</th>
                                            <th>Price</th>
											<th>Quantity</th>
                                            <th>Total Price</th>
											<th>Size</th>
											<th>Color</th>
                               
                                            <th>Status</th>
											<th>Date</th>
											<th>Invoice</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $fet) 
										<tr>
										
                                            <td>{{$fet['order']}}</td>
											<td>{{$fet['code']}}</td>
											<td>{{$fet['pname']}}</td>
                                            <td>{{$fet['pdes']}}</td>
                                            <td>{{$fet['email']}}</td>
                                            <td>{{$fet['srp']}}</td>
                                            <td>{{$fet['quantity']}}</td>
                                            <td>{{$fet['tprice']}}</td>
                                            <td>{{$fet['size']}}</td>
                                            <td>{{$fet['color']}}</td>
                                          
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input permission"
                                                    @if($fet['status'] == "1") 
                                                    checked 
                                                    @endif data-change="{{ $fet['id'] }}" type="checkbox"></div>
                                            </td>
                                            <td>{{$fet['created_at']}}</td>
											
												
											
											<td><a class='btn btn-success' href="{{url('/invoice/'.$fet['id'])}}">Invoice</a></td>
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
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11]
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
  url: "/orderDel/" + del,
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

$(document).on("change", ".permission", function () {

var id = $(this).data("change");
$.ajaxSetup({
  headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
    url: "{{url('approved')}}",
  method: "GET",
  data: {id: id},
  success: function (res) {
	if (res.msg == 1) {
		Lobibox.notify('success', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Data has been updated.'
	});
	}
}
})
  
});
		</script>
		<script src="{{asset('sweatalerts/alerts.js')}}"></script>