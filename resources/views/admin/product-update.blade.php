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
                        <div class="breadcrumb-title pe-3">Product</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Product</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                            <a href="{{url('product')}}"><button type="button" class="btn btn-primary">View Product</button></a>
                         
                              
                            </div>
                        </div>
                    </div>
                    <!--end breadcrumb-->
                    <div class="row">
                        <div class="col-xl-6 mx-auto">
                            <h6 class="mb-0 text-uppercase">Update Product</h6>
                            <hr>

                            <div class="card">
                                <div class="card-body">
                                    <div class="p-4 border rounded">
                                            <div class="col-md-12">
                                            <select class="form-select mb-3" id="selectBox"  onchange="changeFunc();" aria-label="Default select example" name="product">
										<option value="" selected disabled>Product</option>
                                        <option value="single">Single</option>
                                        <option value="multiple">Multiple</option>
									</select>      
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!--single-->
                        <div class="card" style="display: none" id="single">
                                <div class="card-body">
                                    <div class="p-4 border rounded">
                                        <form class="row g-3" id="singlepro" enctype="multipart/form-data">
                                            @method('PUT')
                                        <input type="hidden" value="single" name="type">
                                            <div class="col-md-4">
                                            <select class="form-select mb-3 category" aria-label="Default select example" name="pcname" id="category">
										<option value="" disabled>Category</option>
                                                @foreach($catdata as $value) 
                                                @if($value['cid']==$scat['cid'])
                                               
                                                  <option value="{{$value['cid']}}" selected>{{$value['cname']}}</option>
                                                  @else
                                                  <option value="{{$value['cid']}}">{{$value['cname']}}</option>
                                                @endif
                                                @endforeach
									</select>
                                                    <b><span id="pcname" style="color:red"></span></b>
                                            </div>

                                            <div class="col-md-4">
                                            <select class="form-select mb-3 subcategory" aria-label="Default select example" name="psname" id="subcategory">
										<option value="" disabled>Sub Category</option>
                                                @foreach($subdata as $value) 
                                                @if($value['sid']==$subcat['sid'])
                                                 <option value="{{$value['sid']}}" selected>{{$value['sname']}}</option>
                                                 @else
                                                 <option value="{{$value['sid']}}">{{$value['sname']}}</option>
                                                @endif
                                                @endforeach
									</select>
                                                    <b><span id="psname" style="color:red"></span></b> 
                                            </div>
                                            
                                            <div class="col-md-4">
                                            <select class="form-select mb-3" aria-label="Default select example" name="psupplier">
										<option value="" disabled>Supplier</option>
                                                @foreach($supdata as $value) 
                                                @if($value['sup_id']==$supp['sup_id'])
                                                 <option value="{{$value['sup_id']}}" selected> {{$value->sup_name}}</option>
                                                 @else
                                                 <option value="{{$value['sup_id']}}"> {{$value->sup_name}}</option>
                                                @endif
                                                @endforeach
									</select>
                                                    <b><span id="psupplier" style="color:red"></span></b> 
                                            </div>

                                           
                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="number" placeholder="Product Code" name="code" value="{{$data->product_attr->pcode}}" aria-label="default input example">
                                                    <b><span id="code" style="color:red"></span></b>
                                            </div>
                                           

                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="text" placeholder="Product Name" name="pname" value="{{$data->pname}}" aria-label="default input example">
                                                    <b><span id="pname" style="color:red"></span></b>
                                            </div>

                                          
                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="number" placeholder="Unit Price" name="unit" value="{{$data->product_attr->unit}}" aria-label="default input example">
                                                    <b><span id="unit" style="color:red"></span></b>
                                            </div>
                                           

                                            
                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="number" placeholder="Sale Price" name="sale" value="{{$data->product_attr->srp}}" aria-label="default input example">
                                                    <b><span id="sale" style="color:red"></span></b>
                                            </div>
                                            

                                            <div class="col-md-4">
                                            <select class="form-select mb-3" aria-label="Default select example" name="pquantity">
										<option value="" disabled>Quantity</option>
                                        @foreach($quantdata as $value) 
                                                @if($value['qid']==$quant['qid'])
                                               <option value="{{$value['qid']}}" selected> {{$value->quantity}}</option>
                                                 @else
                                                 <option value="{{$value['qid']}}"> {{$value->quantity}}</option>
                                                @endif
                                                @endforeach
									</select>
                                                    <b><span id="pquantity" style="color:red"></span></b> 
                                            </div>

                                            
                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="number" placeholder="Stock" name="stock" value="{{$data->product_attr->stock}}" aria-label="default input example">
                                                    <b><span id="stock" style="color:red"></span></b>
                                            </div>
                                       
                                            <div class="col-md-4">
                                            <select class="form-select mb-3" aria-label="Default select example" name="status">
										<option value="" disabled>Status</option>
                                        @if($data['status']=="online")
                                        @php
                                        $online="selected";
                                        @endphp
                                         @else
                                         @php
                                         $offline="selected";
                                         @endphp
                                        @endif
                                        <option value="online" {{@$online}}>Online</option>
                                        <option value="offline" {{@$offline}}>Offline</option>
									</select>
                                                    <b><span id="status" style="color:red"></span></b> 
                                            </div>

                                            <div class="col-12">
                                                <textarea class="form-control" id="inputAddress" name="pdes"
                                                    placeholder="Description..." rows="3">{{$data->pdes}}</textarea>
                                                    <b><span id="pdes" style="color:red"></span></b>
                                            </div>
                                            
                                            <div class="col-12">
                                            <input class="form-control mb-3" type="file" name="files[]" multiple>
                                                    <b><span id="files" style="color:red"></span></b>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary" id="sub" type="submit">Submit
                                                    form</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                               <!--multiple-->
                            <div class="card" style="display: none" id="multiple">
                                <div class="card-body">
                                    <div class="p-4 border rounded">
                                        <form class="row g-3" id="multiplepro" enctype="multipart/form-data">
                                            @method('PUT')
                                        <input type="hidden" value="multiple" name="type2">
                                        <div class="col-md-4">
                                            <select class="form-select mb-3 category" aria-label="Default select example" name="pcname2" id="category2">
                                                <option value="" disabled>Category</option>
                                                @foreach($catdata as $value) 
                                                @if($value['cid']==$scat['cid'])
                                                  <option value="{{$value['cid']}}" selected>{{$value['cname']}}</option>
                                                  @else
                                                  <option value="{{$value['cid']}}">{{$value['cname']}}</option>
                                                @endif
                                                @endforeach
									</select>
                                                    <b><span id="pcname2" style="color:red"></span></b>
                                            </div>

                                            <div class="col-md-4">
                                            <select class="form-select mb-3 subcategory" aria-label="Default select example" name="psname2" id="subcategory2">
                                                <option value="" disabled>Sub Category</option>
                                                @foreach($subdata as $value) 
                                                @if($value['sid']==$subcat['sid'])
                                                 <option value="{{$value['sid']}}" selected>{{$value['sname']}}</option>
                                                 @else
                                                 <option value="{{$value['sid']}}">{{$value['sname']}}</option>
                                                @endif
                                                @endforeach
									</select>
                                                    <b><span id="psname2" style="color:red"></span></b> 
                                            </div>
                                            
                                            <div class="col-md-4">
                                            <select class="form-select mb-3" aria-label="Default select example" name="psupplier2">
                                                <option value="" disabled>Supplier</option>
                                                @foreach($supdata as $value) 
                                                @if($value['sup_id']==$supp['sup_id'])
                                                 <option value="{{$value['sup_id']}}" selected> {{$value->sup_name}}</option>
                                                 @else
                                                 <option value="{{$value['sup_id']}}"> {{$value->sup_name}}</option>
                                                @endif
                                                @endforeach
									</select>
                                                    <b><span id="psupplier2" style="color:red"></span></b> 
                                            </div>

                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="text" placeholder="Product Name" name="pname2" value="{{$data->pname}}" aria-label="default input example">
                                                    <b><span id="pname2" style="color:red"></span></b>
                                            </div>

                                            <div class="col-md-4">
                                            <select class="form-select mb-3" aria-label="Default select example" name="pquantity2">
                                                <option value="" disabled>Quantity</option>
                                                @foreach($quantdata as $value) 
                                                        @if($value['qid']==$quant['qid'])
                                                       <option value="{{$value['qid']}}" selected> {{$value->quantity}}</option>
                                                         @else
                                                         <option value="{{$value['qid']}}"> {{$value->quantity}}</option>
                                                        @endif
                                                        @endforeach
									</select>
                                                    <b><span id="pquantity2" style="color:red"></span></b> 
                                            </div>

                                            <div class="col-md-4">
                                            <select class="form-select mb-3" aria-label="Default select example" name="status2">
                                                <option value="" disabled>Status</option>
                                                @if($data['status']=="online")
                                                @php
                                                $online="selected";
                                                @endphp
                                                 @else
                                                 @php
                                                 $offline="selected";
                                                 @endphp
                                                @endif
                                                <option value="online" {{@$online}}>Online</option>
                                                <option value="offline" {{@$offline}}>Offline</option>
									</select>
                                                    <b><span id="status2" style="color:red"></span></b> 
                                            </div>

                                           

                                            <div class="col-12">
                                                <textarea class="form-control" id="inputAddress2" name="pdes2"
                                                    placeholder="Description..." rows="3">{{$data->pdes}}</textarea>
                                                    <b><span id="pdes2" style="color:red"></span></b>
                                            </div>

                                            <h6>Product Attributes</h6>
                                            @if ($data->type=="multiple")
                                            @php
                                              $count=0;
                                              
                                                $loopcount=1;
                                            @endphp
                                             
                                            
                                            <div id="product_fields">
                                                @foreach ($attr as $value)
                                                @php
                                                      $loopprevious=$loopcount;
                                                      
                                                      $count++;
                                                @endphp
                                                <div id="product_attr_{{$loopcount++}}" class="rmv">
                                                  
                                            <div class="row mt-3">
                                                <input type="hidden" name="pa_id2[]" value="{{$value->attr_id}}">
                                                <div class="col-md-4">
                                                    <input class="form-control mb-3" type="number" placeholder="Product Code" name="code2[]" value="{{$value->pcode}}" aria-label="default input example">
                                                        <b><span class="code2" style="color:red"></span></b>
                                                </div>

                                                
                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="number" placeholder="Stock" name="stock2[]" value="{{$value->stock}}" aria-label="default input example">
                                                    <b><span class="stock2" style="color:red"></span></b>
                                            </div>

                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="text" placeholder="Size" name="size2[]" value="{{$value->size}}" aria-label="default input example">
                                                    <b><span class="size2" style="color:red"></span></b>
                                            </div>

                                            
                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="number" placeholder="Unit Price" name="unit2[]" value="{{$value->unit}}" aria-label="default input example">
                                                    <b><span class="unit2" style="color:red"></span></b>
                                            </div>

                                           
                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="number" placeholder="Sale Price" name="sale2[]" value="{{$value->srp}}" aria-label="default input example">
                                                    <b><span class="sale2" style="color:red"></span></b>
                                            </div>

                                            
                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="text" placeholder="Color" name="color2[]" value="{{$value->color}}" aria-label="default input example">
                                                    <b><span class="color2" style="color:red"></span></b>
                                            </div>

                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="file" placeholder="choose file" name="file{{$count}}[]"
                                                    aria-label="default input example" multiple>
                                                    <b><span id="file{{$count}}" class="files2" style="color:red"></span></b>
                                            </div>

                                            <div class="col-md-4">
                                                @if ($loopcount==2)
                                                <button type="button" class="btn btn-success" id="addBtn" onclick="add_more();">Add Form</button>
                                                @else
                                                
                                                <button type="button" data-del="{{$value->attr_id}}" class="del btn btn-danger">Cross</button>
                                                @endif
                                            </div>
                                            </div>
                                                </div>
                                              
                                                @endforeach
                                            </div>
                                            
                                         
                                            @endif
                                            
                                            <div class="col-12">
                                                <button class="btn btn-primary" id="sub2" type="submit">Submit
                                                    form</button>
                                            </div>
                                        </form>
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
                
                var count = <?php echo json_encode(@$count); ?>;
                var count2=0;
function add_more() {
  count++;
  count2++;

  
  var html = '<div id="product_attr_' + count + '"><div class="row mt-3"><input type="hidden" name="pa_id2[]" value="">';
  html += ` <div class="col-md-4">
                                                <input class="form-control mb-3" type="number" placeholder="Product Code" name="code2[]"
                                                    aria-label="default input example">
                                                    <b><span class="code2" style="color:red"></span></b>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="number" placeholder="Stock" name="stock2[]"
                                                    aria-label="default input example">
                                                    <b><span class="stock2" style="color:red"></span></b>
                                            </div>

                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="text" placeholder="Size" name="size2[]"
                                                    aria-label="default input example">
                                                    <b><span class="size2" style="color:red"></span></b>
                                            </div>

                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="number" placeholder="Unit Price" name="unit2[]"
                                                    aria-label="default input example">
                                                    <b><span class="unit2" style="color:red"></span></b>
                                            </div>

                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="number" placeholder="Sale Price" name="sale2[]"
                                                    aria-label="default input example">
                                                    <b><span class="sale2" style="color:red"></span></b>
                                            </div>

                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="text" placeholder="Color" name="color2[]"
                                                    aria-label="default input example">
                                                    <b><span class="color2" style="color:red"></span></b>
                                            </div>

                                            <div class="col-md-4">
                                                <input class="form-control mb-3" type="file" placeholder="choose file" name="files2`+ count2 +`[]"
                                                    aria-label="default input example" multiple>
                                                    <b><span id="files2`+ count2+`" class="files2" style="color:red"></span></b>
                                            </div>`;

  html += `<div class="col-md-4"><button type="button" class="btn btn-danger" onclick="remove_more(` + count + `);">Cross</button></div>`;

  html += '</div></div>';
  jQuery("#product_fields").append(html);
}
function remove_more(count) {
  jQuery("#product_attr_" + count).remove();
}

function changeFunc() {
    var selectBox = document.getElementById("selectBox");
      var multiple = document.getElementById("multiple");
      var single = document.getElementById("single");
     multiple.style.display=selectBox.value=="multiple"?'block':'none';
     single.style.display=selectBox.value=="single"?'block':'none';

    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $("#sub").on("click", function (g) {

            g.preventDefault();
                        $('#pcname').text("");
                        $('#psname').text("");
                        $('#psupplier').text("");
                        $('#code').text("");
                        $('#pname').text("");
                        $('#unit').text("");
                        $('#sale').text("");
                        $('#pquantity').text("");
                        $('#stock').text("");
                        $('#status').text("");
                        $('#pdes').text("");
                        $('#files').text("");
            var formdata = new FormData(singlepro);
            $.ajax({
                url: "{{url('/product/'.$data['pid'])}}",
                method: "POST",
                contentType: false,
                processData: false,
                data: formdata,
                success: function (res) {
                    if (res.status == 1) {
                        $('form').trigger("reset");
                        
                        Lobibox.notify('success', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-check-circle',
		msg: 'Data has been Updated.'
	});
    setTimeout(time,5000);
                        function time(){
                            window.location.href="{{url('/product')}}";
                        }
                    }else if(res.status == 2){
                        Lobibox.notify('info', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-info-circle',
		msg: 'Product already exist.'
	});
                    }

                },
                error: function (error) {
                    
                     $.each(error.responseJSON.errors, function (key, item) 
          {
            let myArray = key.split(".");
            let b=myArray[0];
            // $("#"+b).empty();
                  $("#" + b).html(item+"<br>");
          });
         
          
                }
            });
        });


        $("#sub2").on("click", function (g) {

g.preventDefault();
            $('#pcname2').text("");
            $('#psname2').text("");
            $('#psupplier2').text("");
            $('#pname2').text("");
            $('#pquantity2').text("");
            $('#status2').text("");
            $('#pdes2').text("");
            $('.code2').text("");
            $('.unit2').text("");
            $('.sale2').text("");
            $('.stock2').text("");
            $('.color2').text("");
            $('.size2').text("");
            $('.files2').text("");
var formdata = new FormData(multiplepro);
$.ajax({
    url: "{{url('/product/'.$data['pid'])}}",
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
msg: 'Data has been Updated.'
});
setTimeout(time,5000);
                        function time(){
                            window.location.href="{{url('/product')}}";
                        }
        }else if(res.status == 2){
                        Lobibox.notify('info', {
		pauseDelayOnHover: true,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		icon: 'bx bx-info-circle',
		msg: 'Product already exist.'
	});
                    }

    },
    error: function (error) {
                    
                    $.each(error.responseJSON.errors, function (key, item) 
         {
            // console.log(key);
           let myArray = key.split(".");
           let b=myArray[0];
           let c=myArray[1];
           console.log(c);
           // $("#"+b).empty();
           $("#" + b).html(item+"<br>");
                 $("." + b).eq(c).html(item+"<br>");
         });
        
         
               }
});
});

    });

    $(document).ready(function(){
        $(document).on("change",".category", function(s){
            s.preventDefault();
                var id=$(this).val();
                $.ajax({
                    url:"/product/"+id,
                    method:"GET",
                    success:function(res){
                        // $("#subcategory").html(res);
                        $(".subcategory").empty();
                        $(".subcategory").append("<option selected disabled>Sub Category</option>");
                        $.each(res.msg,function(key,val){
                            $(".subcategory").append(`<option value="${val.sid}">${val.sname}</option>`);
                        })
                    }
                });
            });
    })

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
  url: "/remove/" + del,
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

//   jQuery("#product_attr_" + count).remove();
$(msg).closest(".rmv").remove();

	}
}
})
  }
});
});
	</script>
<script src="{{asset('sweatalerts/alerts.js')}}"></script>