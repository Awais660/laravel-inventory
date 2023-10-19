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
									<li class="breadcrumb-item active" aria-current="page">User Permission</li>
								</ol>
							</nav>
						</div>
					</div>
					<!--end breadcrumb-->
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h4 class="mb-0">User Permission</h4>
							</div>
							<hr/>
							<div class="table-responsive">
								<table  class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>Feedback</th>
											<td><div class="form-check">
                                                <input type="checkbox" class="form-check-input permission"
                                                @if($data['feedback'] == "1" ) 
                                                    checked 
                                                    @endif
                                                     data-type="feedback" data-change="{{$data['id']}}" type="checkbox"
                                                     >
                                                
                                            </div></td>
                                            
										</tr>
									</thead>
									<tbody>
								
										<tr>
                                            <th>
                                                Comment
                                            </th>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input permission"
                                                    @if($data['comment'] == "1") 
                                                    checked 
                                                    @endif
                                                    data-type="comment" data-change="{{ $data['id'] }}" type="checkbox"
                                                    >
                                                   
                                                </div>
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
	
	<script>
	  $(document).on("change", ".permission", function () {

var id = $(this).data("change");
var type = $(this).data("type");
$.ajaxSetup({
  headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
    url: "{{url('permission')}}",
  method: "GET",
  data: {id: id,type: type},
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