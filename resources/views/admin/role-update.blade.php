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
                        <div class="breadcrumb-title pe-3">Role</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Role</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                            <a href="{{url('role')}}"><button type="button" class="btn btn-primary">View Role</button></a>
                            </div>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="row">
                        <div class="col-xl-9 mx-auto">
                            <h6 class="mb-0 text-uppercase">Update Role</h6>
                            <hr>
                            <div class="card">
                                <div class="card-body">
                                    <div class="p-4 border rounded">
                                        <form class="row g-3" id="data">
                                        @method('PUT')
                                            <div class="col-md-12">
                                                <input class="form-control mb-3" type="text" placeholder="Permission" name="name" value="{{$role['name']}}"
                                                    aria-label="default input example">
                                                    <b><span id="name" style="color:red"></span></b>
                                            </div>

                                            <div id="hide">
                                                @foreach ($permissions as $permission)
                                                    
                                                
                                              <div class="form-check">
                          <input class="form-check-input status" type="checkbox" value="{{$permission['id']}}" name="permission[]" id="flexCheckDefault" @if (count($role->permissions->where('id',$permission->id)))
                              checked
                          @endif>
                          <label class="form-check-label" for="flexCheckDefault">
                            {{$permission['name']}}
                          </label>
                        </div>
                        @endforeach
                        </div>
                        <b><span id="permission" style="color:red"></span></b>
                        
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
            $('#name').text("");
            $('#permission').text("");
            var formdata = new FormData(data);
            $.ajax({
                url: "{{url('/role/'.$role['id'])}}",
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
                            window.location.href="{{url('/role')}}";
                        }
                    }

                },
                error: function (error) {

                    $('#name').text(error.responseJSON.errors.name);
                    ('#permission').text(error.responseJSON.errors.permission);
                }
            });
        });
    });
</script>
<script src="{{asset('sweatalerts/alerts.js')}}"></script>