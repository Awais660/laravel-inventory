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
                        <div class="breadcrumb-title pe-3">User</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Update User</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                            <a href="{{url('users')}}"><button type="button" class="btn btn-primary">View User</button></a>
                            </div>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="row">
                        <div class="col-xl-9 mx-auto">
                            <h6 class="mb-0 text-uppercase">Update User</h6>
                            <hr>
                            <div class="card">
                                <div class="card-body">
                                    <div class="p-4 border rounded">
                                        <form class="row g-3" id="data">
                                        @method('PUT')
                                            <div class="col-md-6">
                                                <input class="form-control mb-3" type="text" placeholder="Full Name" name="name" value="{{$user['name']}}"
                                                    aria-label="default input example">
                                                    <b><span id="name" style="color:red"></span></b>
                                            </div>

                                            <div class="col-md-6">
                                                <input class="form-control mb-3" type="email" placeholder="Email" name="email" value="{{$user['email']}}"
                                                    aria-label="default input example">
                                                    <b><span id="email" style="color:red"></span></b>
                                                    
                                            </div>

                                            <div class="col-md-6">
                                                <input class="form-control mb-3" type="text" placeholder="Password" name="password" value="{{$user['password']}}"
                                                    aria-label="default input example">
                                                    <b><span id="password" style="color:red"></span></b>
                                                    
                                            </div>

                                            <div id="hide">
                                                @foreach ($roles as $role)
                                                    
                                                
                                              <div class="form-check">
                          <input class="form-check-input status" type="checkbox" value="{{$role['id']}}" name="role[]" id="flexCheckDefault" @if (count($user->roles->where('id',$role->id)))
                              checked
                          @endif>
                          <label class="form-check-label" for="flexCheckDefault">
                            {{$role['name']}}
                          </label>
                        </div>
                        @endforeach
                        </div>
                        <b><span id="role" style="color:red"></span></b>
                        
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
            $('#email').text("");
            $('#password').text("");
            $('#role').text("");
            var formdata = new FormData(data);
            $.ajax({
                url: "{{url('/users/'.$user['id'])}}",
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
                            window.location.href="{{url('/users')}}";
                        }
                    }

                },
                error: function (error) {

                    $('#name').text(error.responseJSON.errors.name);
                    $('#email').text(error.responseJSON.errors.email);
                    $('#password').text(error.responseJSON.errors.password);
                    ('#role').text(error.responseJSON.errors.role);
                }
            });
        });
    });
</script>
<script src="{{asset('sweatalerts/alerts.js')}}"></script>