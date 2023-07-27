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
                        <div class="breadcrumb-title pe-3">Quantity</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Quantity</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                            <a href="{{url('quantity')}}"><button type="button" class="btn btn-primary">View Quantity</button></a>
                            </div>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="row">
                        <div class="col-xl-9 mx-auto">
                            <h6 class="mb-0 text-uppercase">Update Quantity</h6>
                            <hr>
                            <div class="card">
                                <div class="card-body">
                                    <div class="p-4 border rounded">
                                        <form class="row g-3" id="data">
                                        @method('PUT')
                                            <div class="col-md-12">
                                                <input class="form-control mb-3" type="text" placeholder="Quantity" name="qname" value="{{$data['quantity']}}"
                                                    aria-label="default input example">
                                                    <b><span id="qname" style="color:red"></span></b>
                                            </div>
                                            <div class="col-12">
                                                <textarea class="form-control" id="inputAddress" name="qdes"
                                                    placeholder="Description..." rows="3">{{$data['qdes']}}</textarea>
                                                    <b><span id="qdes" style="color:red"></span></b>
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
            $('#qname').text("");
            $('#qdes').text("");
            var formdata = new FormData(data);
            $.ajax({
                url: "{{url('/quantity/'.$data['qid'])}}",
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
                            window.location.href="{{url('/quantity')}}";
                        }
                    }

                },
                error: function (error) {

                    $('#qname').text(error.responseJSON.errors.qname);
                    $('#qdes').text(error.responseJSON.errors.qdes);
                }
            });
        });
    });
</script>
<script src="{{asset('sweatalerts/alerts.js')}}"></script>