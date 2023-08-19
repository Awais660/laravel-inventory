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
                        <div class="breadcrumb-title pe-3">Sub Category</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Sub Category</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                            <a href="{{url('subcategory')}}"><button type="button" class="btn btn-primary">View Sub Category</button></a>
                            </div>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="row">
                        <div class="col-xl-9 mx-auto">
                            <h6 class="mb-0 text-uppercase">Update Sub Category</h6>
                            <hr>
                     
                            <div class="card">
                                <div class="card-body">
                                    <div class="p-4 border rounded">
                                        <form class="row g-3" id="data">
                                        @method('PUT')
                                        <div class="col-md-12">
                                        <select class="form-select mb-3" aria-label="Default select example" name="cname">
                                        @foreach($catadata as $value) 
                                        @if($value['cid']==$scat['cid'])
                                        <option value="{{$value['cid']}}" selected>{{$value['cname']}}</option>
                                        @else
                                        <option value="{{$value['cid']}}">{{$value['cname']}}</option>
                                        @endif
                                        @endforeach
									</select>
                                                    <b><span id="cname" style="color:red"></span></b>
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form-control mb-3" type="text" placeholder="Category" name="sname" value="{{$data['sname']}}"
                                                    aria-label="default input example">
                                                    <b><span id="sname" style="color:red"></span></b>
                                            </div>
                                            <div class="col-12">
                                                <textarea class="form-control" id="inputAddress" name="sdes"
                                                    placeholder="Description..." rows="3">{{$data['sdes']}}</textarea>
                                                    <b><span id="sdes" style="color:red"></span></b>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary" id="sub" type="submit">Submit
                                                    form</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end page-content-wrapper-->
                </div>
                <!--end page-wrapper-->    
            </div>
            <!-- end wrapper -->
            <x-footer />
            <script>
    $(document).ready(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $("#sub").on("click", function (g) {

            g.preventDefault();
            $('#cname').text("");
            $('#sname').text("");
            $('#sdes').text("");
            var formdata = new FormData(data);
            $.ajax({
                url: "{{url('/subcategory/'.$data['sid'])}}",
                method: "POST",
                contentType: false,
                processData: false,
                data: formdata,
                success: function (res) {
                  
                    if (res.status == 1) {
                    
                        Lobibox.notify('success', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Data has been updated.'
	});
     setTimeout(time,5000);
                        function time(){
                            window.location.href="{{url('/subcategory')}}";
                        }
                    }else if(res.status == 2){
                        Lobibox.notify('info', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-info-circle',
		msg: 'Sub category already exit on this category.'
	});
                    }

                },
                error: function (error) {
                    $('#cname').text(error.responseJSON.errors.cname);
                    $('#sname').text(error.responseJSON.errors.sname);
                    $('#sdes').text(error.responseJSON.errors.sdes);
                }
            });
        });
    });
</script>
<script src="{{asset('sweatalerts/alerts.js')}}"></script>