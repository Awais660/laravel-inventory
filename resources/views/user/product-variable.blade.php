@extends('layout.add')
@section('title', 'Porto - Bootstrap eCommerce Template')
@section('main')

    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('user') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                </ol>
            </nav>

            <div class="product-single-container product-single-default">
                {{-- <div class="cart-message d-none">
                        <strong class="single-cart-notice">“Men Black Sports Shoes”</strong>
                        <span>has been added to your cart.</span>
                    </div> --}}

                <div class="row">
                    <div class="col-lg-5 col-md-6 product-single-gallery">
                        <div class="product-slider-container">
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                                <!---->
                                <div class="product-label label-sale">
                                    -16%
                                </div>
                            </div>

                            <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                @if ($pro['type'] == 'multiple')
                                    @foreach ($pro->product_attrs as $images)
                                        @php
                                            $images = unserialize($images->image);
                                        @endphp
                                        @foreach ($images as $image)
                                            <div class="product-item">
                                                <img class="product-single-image" src="{{ '../images/' . $image }}"
                                                    data-zoom-image="{{ '../images/' . $image }}" width="468"
                                                    height="468" alt="product" />
                                            </div>
                                        @endforeach
                                    @endforeach
                                @else
                                    @php
                                        $images = unserialize($pro->product_attr->image);
                                    @endphp
                                    @foreach ($images as $image)
                                        <div class="product-item">
                                            <img class="product-single-image" src="{{ '../images/' . $image }}"
                                                data-zoom-image="{{ '../images/' . $image }}" width="468" height="468"
                                                alt="product" />
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            <!-- End .product-single-carousel -->
                            <span class="prod-full-screen">
                                <i class="icon-plus"></i>
                            </span>
                        </div>

                        <div class="prod-thumbnail owl-dots">
                            @if ($pro['type'] == 'multiple')
                                @foreach ($pro->product_attrs as $images)
                                    @php
                                        $images = unserialize($images->image);
                                    @endphp
                                    @foreach ($images as $image)
                                        <div class="owl-dot">
                                            <img src="{{ '../images/' . $image }}" width="110" height="110"
                                                alt="product-thumbnail" />
                                        </div>
                                    @endforeach
                                @endforeach
                            @else
                                @php
                                    $images = unserialize($pro->product_attr->image);
                                @endphp
                                @foreach ($images as $image)
                                    <div class="owl-dot">
                                        <img src="{{ '../images/' . $image }}" width="110" height="110"
                                            alt="product-thumbnail" />
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <!-- End .product-single-gallery -->

                    <div class="col-lg-7 col-md-6 product-single-details">
                        <h1 class="product-title">{{ $pro->pname }}</h1>

                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:60%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->

                            <a href="#" class="rating-link">( 6 Reviews )</a>
                        </div>
                        <!-- End .ratings-container -->

                        <hr class="short-divider">

                        <div class="price-box">
                            @if ($pro['type'] == 'multiple')
                                @php
                                    $srp = $pro->product_attrs[0]->srp;
                                @endphp
                                <span class="product-price">{{ $srp }} </span>
                            @else
                                <span class="product-price">{{ $pro->product_attr->srp }} </span>
                                {{-- <span class="product-price"> $35.00</span> --}}
                            @endif
                        </div>
                        <!-- End .price-box -->

                        <div class="product-desc">
                            <p>{{ $pro->pdes }}</p>
                        </div>
                        <!-- End .product-desc -->

                        <ul class="single-info-list">
                            <!---->
                            <li>
                                SKU:
                                @if ($pro['type'] == 'multiple')
                                    @php
                                        $pcode = $pro->product_attrs[0]->pcode;
                                    @endphp
                                    <strong id="code">{{ $pcode }}</strong>
                                @else
                                    <strong>{{ $pro->product_attr->pcode }}</strong>
                                @endif
                            </li>

                            <li>
                                CATEGORY:
                                <strong>
                                    <a href="#" class="product-category">{{ $pro->category->cname }}</a>
                                </strong>
                            </li>
                        </ul>

                        @if ($pro['type'] == 'multiple')
                            <div class="product-filters-container">
                                <div class="product-single-filter"><label>Color:</label>
                                    <ul class="config-size-list config-color-list config-filter-list ulcolor">
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($color as $colors)
                                            @if ($colors == $color[0])
                                                <li class="active"
                                                    onclick="handleClick({{ $count }},'{{ $colors->color }}')">
                                                    <a href="javascript:;" class="form filter-color border-0"
                                                        data-cls="{{ $colors->color }}"style="background-color: {{ $colors->color }};"></a>
                                                </li>
                                            @else
                                                <li class=""
                                                    onclick="handleClick({{ $count }},'{{ $colors->color }}')">
                                                    <a href="javascript:;" class="form filter-color border-0"
                                                        data-cls="{{ $colors->color }}"style="background-color: {{ $colors->color }};"></a>
                                                </li>
                                            @endif
                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach

                                    </ul>
                                </div>

                                <div class="product-single-filter">
                                    <label>Size:</label>
                                    <ul class="config-size-list ulSize">
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($size as $sizes)
                                            @if ($sizes == $size[0])
                                                <li class="active" onclick="markSelected(this, {{ $count }});"
                                                    data-change="{{ $sizes->size }}"><a href="javascript:;"
                                                        class="change d-flex align-items-center justify-content-center">{{ $sizes->size }}</a>
                                                </li>
                                            @else
                                                <li onclick="markSelected(this, {{ $count }});"
                                                    data-change="{{ $sizes->size }}"><a href="javascript:;"
                                                        class="change d-flex align-items-center justify-content-center">{{ $sizes->size }}</a>
                                                </li>
                                            @endif
                                            @php
                                                $count++;
                                            @endphp
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="">
                                    {{-- <label></label>
                                    <a class="font1 text-uppercase clear-btn" href="#">Clear</a> --}}
                                </div>
                                <!---->
                            </div>
                        @endif

                        {{-- <div class="product-action">
                                <div class="price-box product-filtered-price">
                                    <del class="old-price"><span>$286.00</span></del>
                                    <span class="product-price">$245.00</span>
                                </div> --}}
                        <form class="form-submit">
                            <div class="product-single-qty">
                                <input class="horizontal-quantity form-control qty" type="text">
                            </div>
                            <!-- End .product-single-qty -->


                            <input type="hidden" name="id" id="pid" value="{{ $pro['pid'] }}">
                            <input type="hidden" class="pname" name="pname" value="{{ $pro['pname'] }}">
                            <input type="hidden" class="pdes" name="pdes" value="{{ $pro['pdes'] }}">
                            <input type="hidden" class="stock" name="stock"
                                value="{{ $pro->product_attrs[0]->stock }}">
                            @if ($pro['type'] == 'multiple')
                                <input type="hidden" class="unit" name="unit"
                                    value="{{ $pro->product_attrs[0]->unit }}">
                                <input type="hidden" class="srp" name="srp"
                                    value="{{ $pro->product_attrs[0]->srp }}">
                                <input type="hidden" class="size" name="size"
                                    value="{{ $pro->product_attrs[0]->size }}">
                                <input type="hidden" class="color" name="color"
                                    value="{{ $pro->product_attrs[0]->color }}">
                                @php
                                    $image = unserialize($pro->product_attrs[0]->image);
                                @endphp
                                <input type="hidden" class="image" name="image" value="{{ $image[0] }}">
                                <input type="hidden" class="pcode" name="pcode"
                                    value="{{ $pro->product_attrs[0]->pcode }}">
                            @else
                                <input type="hidden" class="stock" name="stock"
                                    value="{{ $pro->product_attr->stock }}">
                                <input type="hidden" class="unit" name="unit"
                                    value="{{ $pro->product_attr->unit }}">
                                <input type="hidden" class="srp" name="srp"
                                    value="{{ $pro->product_attr->srp }}">
                                @php
                                    $image = unserialize($pro->product_attr->image);
                                @endphp
                                <input type="hidden" class="image" name="image" value="{{ $image[0] }}">
                                <input type="hidden" class="pcode" name="pcode"
                                    value="{{ $pro->product_attr->pcode }}">
                            @endif
                            <a href="javascript:;" class="btn btn-dark add-cart mr-2" id="additem"
                                title="Add to Cart">Add to
                                Cart</a>


                            <a href="{{ url('cart') }}" class="btn btn-gray view-cart d-none">View cart</a>
                        </form>
                    </div>
                    <!-- End .product-action -->

                    <hr class="divider mb-0 mt-0">

                    <div class="product-single-share mb-2">
                        <label class="sr-only">Share:</label>

                        <div class="social-icons mr-2">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                title="Facebook"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                title="Twitter"></a>
                            <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                                title="Linkedin"></a>
                            <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                                title="Google +"></a>
                            <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank"
                                title="Mail"></a>
                        </div>
                        <!-- End .social-icons -->

                        <a href="{{ url('wishlist') }}" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
                                class="icon-wishlist-2"></i><span>Add to
                                Wishlist</span></a>
                    </div>
                    <!-- End .product single-share -->
                </div>
                <!-- End .product-single-details -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .product-single-container -->

        <div class="product-single-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content"
                        role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content"
                        role="tab" aria-controls="product-size-content" aria-selected="true">Size Guide</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content"
                        role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
                        Information</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content"
                        role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (1)</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                    aria-labelledby="product-tab-desc">
                    <div class="product-desc-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis
                            nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                        <ul>
                            <li>Any Product types that You want - Simple, Configurable
                            </li>
                            <li>Downloadable/Digital Products, Virtual Products
                            </li>
                            <li>Inventory Management with Backordered items
                            </li>
                        </ul>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    </div>
                    <!-- End .product-desc-content -->
                </div>
                <!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-size-content" role="tabpanel" aria-labelledby="product-tab-size">
                    <div class="product-size-content">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ url('assets/images/products/single/body-shape.png') }}" alt="body shape"
                                    width="217" height="398">
                            </div>
                            <!-- End .col-md-4 -->

                            <div class="col-md-8">
                                <table class="table table-size">
                                    <thead>
                                        <tr>
                                            <th>SIZE</th>
                                            <th>CHEST (in.)</th>
                                            <th>WAIST (in.)</th>
                                            <th>HIPS (in.)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>XS</td>
                                            <td>34-36</td>
                                            <td>27-29</td>
                                            <td>34.5-36.5</td>
                                        </tr>
                                        <tr>
                                            <td>S</td>
                                            <td>36-38</td>
                                            <td>29-31</td>
                                            <td>36.5-38.5</td>
                                        </tr>
                                        <tr>
                                            <td>M</td>
                                            <td>38-40</td>
                                            <td>31-33</td>
                                            <td>38.5-40.5</td>
                                        </tr>
                                        <tr>
                                            <td>L</td>
                                            <td>40-42</td>
                                            <td>33-36</td>
                                            <td>40.5-43.5</td>
                                        </tr>
                                        <tr>
                                            <td>XL</td>
                                            <td>42-45</td>
                                            <td>36-40</td>
                                            <td>43.5-47.5</td>
                                        </tr>
                                        <tr>
                                            <td>XLL</td>
                                            <td>45-48</td>
                                            <td>40-44</td>
                                            <td>47.5-51.5</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End .row -->
                    </div>
                    <!-- End .product-size-content -->
                </div>
                <!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                    <table class="table table-striped mt-2">
                        <tbody>
                            <tr>
                                <th>Weight</th>
                                <td>23 kg</td>
                            </tr>

                            <tr>
                                <th>Dimensions</th>
                                <td>12 × 24 × 35 cm</td>
                            </tr>

                            <tr>
                                <th>Color</th>
                                <td>Black, Green, Indigo</td>
                            </tr>

                            <tr>
                                <th>Size</th>
                                <td>Large, Medium, Small</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel"
                    aria-labelledby="product-tab-reviews">
                    <div class="product-reviews-content">






                        <div class="add-product-review">
                            @if ($permission->feedback=="1")
                            <h3 class="review-title">Add a review</h3>
                            
                                
                            
                            <form action="#" class="comment-form m-0" id="data">

                                <div class="rating-form">
                                    <label for="rating">Your rating <span class="required">*</span></label>
                                    <span class="rating-stars">
                                        <a class="star-1" href="#">1</a>
                                        <a class="star-2" href="#">2</a>
                                        <a class="star-3" href="#">3</a>
                                        <a class="star-4" href="#">4</a>
                                        <a class="star-5" href="#">5</a>
                                    </span>

                                    <select name="rating" id="rating" required="" style="display: none;">
                                        <option value="">Rate…</option>
                                        <option value="5">Perfect</option>
                                        <option value="4">Good</option>
                                        <option value="3">Average</option>
                                        <option value="2">Not that bad</option>
                                        <option value="1">Very poor</option>
                                    </select>
                                </div>



                                <input type="hidden" name="post" id="post" value="{{ $pro['pid'] }}"
                                    required>

                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="form-group">
                                            <label>Title <span class="required">*</span></label>
                                            <input type="text" name="title"
                                                class="form-control form-control-sm" required>
                                        </div>
                                        <b><span id="title" style="color:red"></span></b>
                                        <!-- End .form-group -->
                                    </div>

                                    <div class="col-md-6 col-xl-12">
                                        <div class="form-group">
                                            <label>Category <span class="required">*</span></label>
                                            <select name="category" class="form-control form-control-sm"
                                                 required>
                                                <option value="">Select....</option>
                                                <option value="bug report">Bug Report</option>
                                                <option value="feature request">Feature Request</option>
                                                <option value="improvement">Improvement</option>
                                            </select>
                                        </div>
                                        <b><span id="category" style="color:red"></span></b>
                                        <!-- End .form-group -->
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Your review <span class="required">*</span></label>
                                    <textarea cols="5" rows="6" name="review" class="form-control form-control-sm"></textarea>
                                    <b><span id="review" style="color:red"></span></b>
                                </div>
                                <!-- End .form-group -->

                                <input type="submit" class="btn btn-primary" id="sub" value="Submit">
                            </form>
                            
                            <div class="divider"></div>
                            @endif
                            <h3 class="reviews-title">1 review for Men Black Sports Shoes</h3>
                            <div id="postFeedback">
                                @include('user.feedback', [
                                    'feedbacks' => $feedback,
                                    'post_id' => $pro->pid,
                                    'permissions' => $permission,
                                ])
                            </div>
                        </div>



                    </div>
                    <!-- End .product-reviews-content -->
                </div>
                <!-- End .tab-pane -->
            </div>
            <!-- End .tab-content -->
        </div>
        <!-- End .product-single-tabs -->

        <div class="products-section pt-0">
            <h2 class="section-title">Related Products</h2>

            <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                <div class="product-default">
                    <figure>
                        <a href="{{ url('product') }}">
                            <img src="{{ url('assets/images/products/product-1.jpg') }}" width="280" height="280"
                                alt="product">
                            <img src="{{ url('assets/images/products/product-1-2.jpg') }}" width="280" height="280"
                                alt="product">
                        </a>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                            <div class="product-label label-sale">-20%</div>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="category-list">
                            <a href="{{ url('cat') }}" class="product-category">Category</a>
                        </div>
                        <h3 class="product-title">
                            <a href="{{ url('product') }}">Ultimate 3D Bluetooth Speaker</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:80%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->
                        <div class="price-box">
                            <del class="old-price">$59.00</del>
                            <span class="product-price">$49.00</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">
                            <a href="{{ url('wishlistl') }}" title="Wishlist" class="btn-icon-wish"><i
                                    class="icon-heart"></i></a>
                            <a href="{{ url('product') }}" class="btn-icon btn-add-cart"><i
                                    class="fa fa-arrow-right"></i><span>SELECT
                                    OPTIONS</span></a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                    class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>

            </div>
            <!-- End .products-slider -->
        </div>
        <!-- End .products-section -->

        <hr class="mt-0 m-b-5" />

        <!-- End .row -->
        </div>
        <!-- End .container -->
    </main>
    <!-- End .main -->

@endsection
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    function toggleReplyForm(button) {
        // Find the closest reply form and toggle its visibility
        $(button).closest('.comment-list').find('.reply-form').toggle();
    }

    function markSelected(element, index) {

        var liElements2 = document.querySelectorAll('.ulSize li');
        var liElements = document.querySelectorAll('.ulcolor li');

        if (liElements2[index].classList.contains('active')) {
            // Remove "active" class from all <li> elements
            liElements.forEach(function(li) {
                li.classList.remove('active');
            });

        } else {

            var change = element.getAttribute('data-change');
            var id = $('#pid').val();
            var msg = this;
            $.ajax({
                url: "{{ url('change') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    change: change,
                    id: id
                },
                success: function(res) {
                    $("#code").html(res.data[0].pcode);
                    $(".product-price").html(res.data[0].srp);
                    $(".stock").val(res.data[0].stock);
                    $(".unit").val(res.data[0].unit);
                    $(".srp").val(res.data[0].srp);
                    $(".size").val(res.data[0].size);
                    $(".color").val(res.data[0].color);
                    $(".image").val(res.image);
                    $(".pcode").val(res.data[0].pcode);

                    $(".ulcolor").html(function() {
                        var htmlContent = "";
                        var count = 0;
                        $.each(res.data, function(key, val) {
                            if (val.color == res.data[0].color) {
                                htmlContent += `<li class="active" onclick="markActive(${count}, '${val.color}');">
                      <a href="javascript:;" class="form filter-color border-0"  data-cls="` + val.color +
                                    `" style="background-color: ` + val.color + `"></a>
                    </li>`;
                            } else {
                                htmlContent += `<li class="" onclick="markActive(${count}, '${val.color}');">
                      <a href="javascript:;" class="form filter-color border-0" 
                       data-cls="` + val.color + `" style="background-color: ` + val.color + `"></a>
                    </li>`;
                            }
                            count++;
                        });
                        return htmlContent;
                    });

                }
            });
        }
    }

    $(document).ready(function() {

        $(document).on("click", "#additem", function(stop) {

            stop.preventDefault();
            var form = $(this).closest(".form-submit");
            var id = form.find(".pid").val();
            var name = form.find(".pname").val();
            var des = form.find(".pdes").val();
            var qty = form.find(".qty").val();
            var stock = form.find(".stock").val();
            var unit = form.find(".unit").val();
            var srp = form.find(".srp").val();
            var size = form.find(".size").val();
            var color = form.find(".color").val();
            var image = form.find(".image").val();
            var code = form.find(".pcode").val();

            $.ajax({
                url: "{{ url('addcart') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    pid: id,
                    pname: name,
                    pdes: des,
                    pqty: qty,
                    pstock: stock,
                    punit: unit,
                    psrp: srp,
                    psize: size,
                    pcolor: color,
                    pimage: image,
                    pcode: code
                },
                success: function(res) {
                    if (res.msg == 3) {
                        Swal.fire(
                            'Sorry',
                            'Product already exsist',
                            'question'
                        )
                    } else if (res.msg == 1) {
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: 'Add in Cart',
                            animation: false,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timeProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseenter', Swal
                                    .resumeTimer)
                            }

                        })

                        $('form').trigger("reset");
                    } else if (res.msg == 2) {
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: 'Could not inserted',
                            animation: false,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timeProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseenter', Swal
                                    .resumeTimer)
                            }

                        })
                    } else if (res.msg == 5) {
                        Swal.fire({
                            toast: true,
                            icon: 'error',
                            title: 'Out of stock',
                            animation: false,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timeProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseenter', Swal
                                    .resumeTimer)
                            }

                        })
                    } else if (res.msg == 4) {
                        window.location.href = "login.php";
                    }
                }
            });
        });


        $("#sub").on("click", function(g) {

            g.preventDefault();
            var formdata = new FormData(data);
            $.ajax({
                url: "{{ url('feedback') }}",
                method: "POST",
                contentType: false,
                processData: false,
                data: formdata,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {

                    if (res.status == 1) {
            $('#title').text("");
            $('#category').text("");
            $('#review').text("");
                        getData();
                        $('form').trigger("reset");

                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: 'Submit',
                            animation: false,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timeProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseenter', Swal
                                    .resumeTimer)
                            }

                        })
                    } else if (res.status == 2) {
                        Swal.fire({
                            toast: true,
                            icon: 'error',
                            title: "can't submit",
                            animation: false,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timeProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal
                                    .stopTimer)
                                toast.addEventListener('mouseenter', Swal
                                    .resumeTimer)
                            }

                        })
                    }

                },
                error: function(error) {

                    $('#title').text(error.responseJSON.errors.title);
                    $('#category').text(error.responseJSON.errors.category);
                    $('#review').text(error.responseJSON.errors.review);
                }
            });
        });

    });


    function deleteFeedback(delId) {
        var type = 'feedback';
        var msg = this;

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
                    url: "{{ url('deleteComment') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: delId,
                        type: type
                    },
                    success: function(res) {
                        if (res.msg == 1) {
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: 'Deleted',
                                animation: false,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 3000,
                                timeProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener(
                                        'mouseenter', Swal.stopTimer)
                                    toast.addEventListener(
                                        'mouseenter', Swal.resumeTimer)
                                }
                            });
                            location.reload(true);
                        } else if (res.msg == 2) {
                            Swal.fire({
                                toast: true,
                                icon: 'error',
                                title: 'Not Deleted',
                                animation: false,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 3000,
                                timeProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener(
                                        'mouseenter', Swal.stopTimer)
                                    toast.addEventListener(
                                        'mouseenter', Swal.resumeTimer)
                                }
                            })
                        }
                    }
                })
            }
        });
    }

    function getData() {
        
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                type: "POST",
                url: "{{ url('showfeedback') }}",
                data: {
                    post_id: $('#post').val(),
                },
                success: function(response) {
                   
                    $('#postFeedback').empty();
                    $('#postFeedback').append(response.html);
                }
            });

        }

    function submitReply(event, url, csrfToken) {
        event.preventDefault();
        var form = event.target.closest('.reply-form2'); // Find the closest form to the clicked button
        var formdata = new FormData(form); // Get form data
        $.ajax({
            url: url,
            method: "POST",
            contentType: false,
            processData: false,
            data: formdata,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(res) {
                if (res.status == 1) {
                    $('#comment').text("");
                    getData();
                    form.reset();

                    Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: 'Submit',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timeProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseenter', Swal.resumeTimer);
                        }
                    });
                } else if (res.status == 2) {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: "Can't submit",
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timeProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseenter', Swal.resumeTimer);
                        }
                    });
                }
            },
            error: function(error) {
                $('#comment').text(error.responseJSON.errors.comment);
            }
        });
    }

    function handleClick(index, message) {

        var liElements = document.querySelectorAll('.ulcolor li');

        if (!liElements[index].classList.contains('active')) {
            $(".color").val(message);
        } else {
            $(".color").val("");
        }

    }

    function markActive(index, message) {
        var liElements = document.querySelectorAll('.ulcolor li');

        if (!liElements[index].classList.contains('active')) {
            // Remove "active" class from all <li> elements
            liElements.forEach(function(li) {
                li.classList.remove('active');
            });

            // Add "active" class to the clicked <li> element
            liElements[index].classList.add('active');
            $(".color").val(message);
        } else {
            liElements[index].classList.remove('active');
            $(".color").val("");
        }
    }
</script>
