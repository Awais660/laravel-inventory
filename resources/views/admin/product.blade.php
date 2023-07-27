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
						<div class="breadcrumb-title pe-3">Products</div>
						<div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">
									<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">View Products</li>
								</ol>
							</nav>
						</div>
						<div class="ms-auto">
							<div class="btn-group">
							<a href="{{url('product/create')}}"><button type="button" class="btn btn-primary">Add Products</button></a>
								
								
							</div>
						</div>
					</div>
					<!--end breadcrumb-->
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">View Products</h4>
							</div>
							<hr/>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>Category</th>
											<th>Sub Category</th>
                                            <th>Supplier</th>
											<th>Quantity</th>
                                            <th>Product Name</th>
											<th>Description</th>
											<th>Status</th>
											<th>Size</th>
											<th>Product Code</th>
                                            <th>Stock</th>
											<th>Unit Price</th>
                                            <th>Sale Price</th>
                                            <th>Color</th>
                                            <th>Image</th>
											<th>Update</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $fet) 
										<tr>
											<td>{{$fet->category->cname}}</td>
                                            <td>{{$fet->subcategory->sname}}</td>
                                            <td>{{$fet->supplier->sup_name}}</td>
											<td>{{$fet->quantity->quantity}}</td>
                                            <td>{{$fet['pname']}}</td>
											<td>{{$fet['pdes']}}</td>
											<td>{{$fet['status']}}</td>
											<td>
												@if ($fet['type']=="multiple")
													@foreach ($fet->product_attrs as $sizes)
														{{$sizes->size}}<br>
													@endforeach
													@else
													{{$fet->product_attr->size}}
												@endif
											</td>
											<td>
												@if ($fet['type']=="multiple")
													@foreach ($fet->product_attrs as $pcodes)
													 {{$pcodes->pcode}}<br>
													@endforeach
													@else
													{{$fet->product_attr->pcode}}
												@endif
											</td>
                                            <td>
												@if ($fet['type']=="multiple")
													@foreach ($fet->product_attrs as $stocks)
														{{$stocks->stock}}<br>
													@endforeach
													@else
													{{$fet->product_attr->stock}}
												@endif
											</td>
											<td>
												@if ($fet['type']=="multiple")
												@foreach ($fet->product_attrs as $units)
													{{$units->unit}}<br>
												@endforeach
												@else
												{{$fet->product_attr->unit}}
											@endif
											</td>
                                            <td>
												@if ($fet['type']=="multiple")
													@foreach ($fet->product_attrs as $srps)
														{{$srps->srp}}<br>
													@endforeach
													@else
													{{$fet->product_attr->srp}}
												@endif
											</td>
                                            <td>
												@if ($fet['type']=="multiple")
													@foreach ($fet->product_attrs as $colors)
														{{$colors->color}}<br>
													@endforeach
													@else
													{{$fet->product_attr->color}}
												@endif
											</td>
                                            <td>
												
												@if ($fet['type']=="multiple")
												@foreach ($fet->product_attrs as $images)
												@php
													$image=unserialize($images->image);
												@endphp
												
												 <img src="{{"./images/".$image[0]}}" width="70px" height="50px">
												
												<br><br>
												@endforeach
												@else
												
												@php
													$image=unserialize($fet->product_attr->image);
												@endphp
											
												<img src="{{"./images/".$image[0]}}" width="70px" height="50px">
											
												
											@endif
												
											</td>
											<td><a class='btn btn-success' href="{{url('/product/'.$fet['pid'].'/edit/')}}">Update</a></td>
                                            <td><button type='button' data-del="{{$fet['pid']}}" class='del btn btn-danger'>Delete</button></td>
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
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11,12]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11,12]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11,12]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11,12]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11,12]
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
  url: "/product/" + del,
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