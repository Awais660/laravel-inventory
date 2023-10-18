<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield("title")</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/icons/favicon.png')}}">


    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'asset/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/demo4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token()}}">
</head>

<body>
    <div class="page-wrapper">
      

        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left d-none d-sm-block">
                        <p class="top-message text-uppercase">FREE Returns. Standard Shipping Orders $99+</p>
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right header-dropdowns ml-0 ml-sm-auto w-sm-100">
                        <div class="header-dropdown dropdown-expanded d-none d-lg-block">
                            <a href="#">Links</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="{{url('dashboard')}}">My Account</a></li>
                                    <li><a href="{{url('about')}}">About Us</a></li>
                                    <li><a href="{{url('blog')}}">Blog</a></li>
                                    <li><a href="{{url('wishlist')}}">My Wishlist</a></li>
                                    <li><a href="{{url('cart')}}">Cart</a></li>
                                    @if (!session()->has("useremail"))
                                    <li><a href="{{url('Login')}}">Log In</a></li>
                                    <li><a href="{{url('register')}}">Register</a></li>
                                    @else
                                    <li><a href="{{url('userLogout')}}">Logout</a></li>
                                    @endif
                                </ul>
                            </div>
                            <!-- End .header-menu -->
                        </div>
                        <!-- End .header-dropown -->

                        

                        <span class="separator"></span>

                        <div class="social-icons">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                            <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
                        </div>
                        <!-- End .social-icons -->
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-top -->

            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
                <div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler text-primary mr-2" type="button">
							<i class="fas fa-bars"></i>
						</button>
                        <a href="{{url('/')}}" class="logo">
                            <img src="{{url('assets/images/logo.png')}}" width="111" height="44" alt="Porto Logo">
                        </a>
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right w-lg-max">
                        <div class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                                    <div class="select-custom">
                                        <select id="cat" name="cat">
											<option value="">All Categories</option>
											@foreach($cat as $fet) 
                                            <option value="{{$fet->cid}}">{{$fet->cname}}</option>
                                            @endforeach
											
										</select>
                                    </div>
                                    <!-- End .select-custom -->
                                    <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                                </div>
                                <!-- End .header-search-wrapper -->
                            </form>
                        </div>
                        <!-- End .header-search -->

                        <div class="header-contact d-none d-lg-flex pl-4 pr-4">
                            <img alt="phone" src="{{url('assets/images/phone.png')}}" width="30" height="30" class="pb-1">
                            <h6><span>Call us now</span><a href="{{url('tel:#')}}" class="text-dark font1">+123 5678 890</a></h6>
                        </div>

                        <a href="{{url('login')}}" class="header-icon" title="login"><i class="icon-user-2"></i></a>

                        <a href="{{url('wishlist')}}" class="header-icon" title="wishlist"><i class="icon-wishlist-2"></i></a>

                        <div class="dropdown cart-dropdown">
                            <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="minicart-icon"></i>
                                <span class="cart-count badge-circle">1</span>
                            </a>

                            <div class="cart-overlay"></div>

                            <div class="dropdown-menu mobile-cart">
                                <a href="#" title="Close (Esc)" class="btn-close">×</a>

                                <div class="dropdownmenu-wrapper custom-scrollbar">
                                    <div class="dropdown-cart-header">Shopping Cart</div>
                                    <!-- End .dropdown-cart-header -->

                                    <div class="dropdown-cart-products">
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="{{url('product')}}">Ultimate 3D Bluetooth Speaker</a>
                                                </h4>

                                                <span class="cart-product-info">
													<span class="cart-product-qty">1</span> × $99.00
                                                </span>
                                            </div>
                                            <!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="{{url('assets/images/products/product-1.jpg')}}" alt="product" width="80" height="80">
                                                </a>

                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div>
                                        <!-- End .product -->

                                      

                                        
                                    </div>
                                    <!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>SUBTOTAL:</span>

                                        <span class="cart-total-price float-right">$134.00</span>
                                    </div>
                                    <!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{url('cart')}}" class="btn btn-gray btn-block view-cart">View
											Cart</a>
                                        <a href="{{url('checkout')}}" class="btn btn-dark btn-block">Checkout</a>
                                    </div>
                                    <!-- End .dropdown-cart-total -->
                                </div>
                                <!-- End .dropdownmenu-wrapper -->
                            </div>
                            <!-- End .dropdown-menu -->
                        </div>
                        <!-- End .dropdown -->
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-middle -->

            <div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
                <div class="container">
                    <nav class="main-nav w-100">
                        <ul class="menu">
                            <li class="active">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            
                            <li>
                                <a href="{{url('cat')}}">CATEGORIES</a>
                                <ul>
                                    @foreach ($cat as $fet)
                                    <li><a href="{{url('cat')}}">{{$fet->cname}}</a>
                                        <ul>
                                            @foreach ($fet->subcategories as $sub)
                                            <li><a href="{{url('sub')}}">{{$sub->sname}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                    {{-- <li><a href="{{url('about')}}">About Us</a></li> --}}
                                    
                                </ul>
                            </li>
                            <li><a href="{{url('shop')}}">Shop</a></li>
                            <li><a href="{{url('about')}}">About us</a></li>
                            <li><a href="{{url('contact')}}">Contact Us</a></li>
                            
                        </ul>
                    </nav>
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-bottom -->
        </header>
        <!-- End .header -->

        @yield("main")

        <footer class="footer bg-dark">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Contact Info</h4>
                                <ul class="contact-info">
                                    <li>
                                        <span class="contact-info-label">Address:</span>123 Street Name, City, England
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Phone:</span><a href="{{url('tel:')}}">(123)
											456-7890</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Email:</span> <a href="{{url('https://portotheme.com/cdn-cgi/l/email-protection#5e333f37321e3b263f332e323b703d3133')}}"><span class="__cf_email__" data-cfemail="6e030f07022e0b160f031e020b400d0103">[email&#160;protected]</span></a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Working Days/Hours:</span> Mon - Sun / 9:00 AM - 8:00 PM
                                    </li>
                                </ul>
                                <div class="social-icons">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                    <a href="#" class="social-icon social-instagram icon-instagram" target="_blank" title="Instagram"></a>
                                </div>
                                <!-- End .social-icons -->
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-4 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4>

                                <ul class="links">
                                    <li><a href="{{url('dashboard')}}">My Account</a></li>
                                    <li><a href="{{url('about')}}">About Us</a></li>
                                </ul>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-4 -->


                        <div class="col-lg-4 col-sm-6">
                            <div class="widget widget-newsletter">
                                <h4 class="widget-title">Subscribe newsletter</h4>
                                <p>Get all the latest information on events, sales and offers. Sign up for newsletter:
                                </p>
                                <form action="#" class="mb-0">
                                    <input type="email" class="form-control m-b-3" placeholder="Email address" required>

                                    <input type="submit" class="btn btn-primary shadow-none" value="Subscribe">
                                </form>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-4 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .footer-middle -->

            <div class="container">
                <div class="footer-bottom">
                    <div class="container d-sm-flex align-items-center">
                        <div class="footer-left">
                            <span class="footer-copyright">© Porto eCommerce. 2021. All Rights Reserved</span>
                        </div>

                        <div class="footer-right ml-auto mt-1 mt-sm-0">
                            <div class="payment-icons">
                                <span class="payment-icon visa" style="background-image: url(assets/images/payments/payment-visa.svg)"></span>
                                <span class="payment-icon paypal" style="background-image: url(assets/images/payments/payment-paypal.svg)"></span>
                                <span class="payment-icon stripe" style="background-image: url(assets/images/payments/payment-stripe.png)"></span>
                                <span class="payment-icon verisign" style="background-image:  url(assets/images/payments/payment-verisign.svg)"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .footer-bottom -->
            </div>
            <!-- End .container -->
        </footer>
        <!-- End .footer -->
    </div>
    <!-- End .page-wrapper -->

    


    <!-- Plugins JS File -->
    <script data-cfasync="false" src="{{asset('../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script><script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/optional/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.countTo.js')}}"></script>
    <script src="{{asset('assets/js/jquery.appear.min.js')}}"></script>
    <script src="{{asset('assets/js/nouislider.min.js')}}"></script>
    <script src="{{asset('sweatalerts/alerts.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('assets/js/main.min.js')}}"></script>
<script>(function(){var js = "window['__CF$cv$params']={r:'7ac60b9c1c1fd1cc',m:'vB9qgDbxbX79wFvxko2OEwJyNrHC07D1MJENFMoaEZg-1679567913-0-AY/+rYTDStAy/YspO6MFZ3m9PACLhVkgGo5O9oWl2DKCUWlf/86ulrpMH5ClU1AKHw6qizWO4r0tviaQk8ldwYZ2E9iS1Q/0LC+g4FMHbCS3oWttYFsnyerYvl+pMagnQiraiOYozU0eYqpJd0zBvtqK/rxl+jAsRzZvlfF6/0cn',s:[0x2b278055c1,0x49b5a683a3],u:'/cdn-cgi/challenge-platform/h/g'};var now=Date.now()/1000,offset=14400,ts=''+(Math.floor(now)-Math.floor(now%offset)),_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/g/scripts/alpha/invisible5615.js?ts='+ts,document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.nonce = '';_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();</script></body>

</html>