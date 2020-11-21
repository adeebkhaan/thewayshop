<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>TheWayShop</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ url('resources/frontend/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ url('resources/frontend/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('resources/frontend/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ url('resources/frontend/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ url('resources/frontend/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('resources/frontend/css/custom.css')}}">
    
    <script src="{{ url('resources/admin/plugins/jquery/jquery.min.js')}}"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Now Man
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Fashion
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Now Man
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Fashion
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +92 302 5036427</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="{{ url('/cart') }}"><i class="fa fa-cart-plus"></i> Cart</a></li>
                            @if(empty(Auth::check()))
                            <li><a href="{{ url('/login-register') }}"><i class="fa fa-user"></i> Login</a></li>
                            @else
                            <li><a href="{{ url('/account') }}"><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="{{ url('/user-logout') }}"><i class="fa fa-lock"></i> Logout</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @yield('content')

 <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ url('resources/frontend/images/instagram-img-01.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ url('resources/frontend/images/instagram-img-02.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ url('resources/frontend/images/instagram-img-03.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ url('resources/frontend/images/instagram-img-04.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ url('resources/frontend/images/instagram-img-05.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ url('resources/frontend/images/instagram-img-06.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ url('resources/frontend/images/instagram-img-07.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ url('resources/frontend/images/instagram-img-08.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ url('resources/frontend/images/instagram-img-09.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{ url('resources/frontend/images/instagram-img-05.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About ThewayShop</h4>
                            <p>The best online shopping store where you can buy everything you want. Home delievery is available anytime anywhere.
                                </p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 3756 <br>Preston Street Wichita,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->


    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ url('resources/frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ url('resources/frontend/js/popper.min.js')}}"></script>
    <script src="{{ url('resources/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ url('resources/admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ url('resources/frontend/js/jquery.superslides.min.js')}}"></script>
    <script src="{{ url('resources/frontend/js/bootstrap-select.js')}}"></script>
    <script src="{{ url('resources/frontend/js/inewsticker.js')}}"></script>
    <script src="{{ url('resources/frontend/js/bootsnav.js')}}"></script>
    <script src="{{ url('resources/frontend/js/images-loded.min.js')}}"></script>
    <script src="{{ url('resources/frontend/js/isotope.min.js')}}"></script>
    <script src="{{ url('resources/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{ url('resources/frontend/js/baguetteBox.min.js')}}"></script>
    <script src="{{ url('resources/frontend/js/form-validator.min.js')}}"></script>
    <script src="{{ url('resources/frontend/js/contact-form-script.js')}}"></script>
    <script src="{{ url('resources/frontend/js/custom.js')}}"></script>

    <script type="text/javascript">
        
        $(document).ready(function(){
            $("#selSize").change(function(){

                var idSize = $(this).val();
                
                if(idSize == ""){
                    return false;
                }

                $.ajax({

                    type : 'get',
                    url : '/shop/get-product-price',
                    data : {idSize:idSize},
                    success:function(resp){

                        var arr = resp.split("#");
                        $("#getPrice").html("Price : Rs "+arr[0]);
                        $('#price').val(arr[0]);

                    },
                    error:function(){
                        alert("Error");
                    }
                });
            });
            $("#billtoshop").click(function(){
                if(this.checked)
                {
                    $("#shipping_name").val($("#billing_name").val());
                    $("#shipping_address").val($("#billing_address").val());
                    $("#shipping_city").val($("#billing_city").val());
                    $("#shipping_country").val($("#billing_country").val());
                    $("#shipping_phone").val($("#billing_phone").val());
                    $("#shipping_pincode").val($("#billing_pincode").val());
                }
                else
                {
                    $("#shipping_name").val('');
                    $("#shipping_address").val('');
                    $("#shipping_city").val('');
                    $("#shipping_country").val('');
                    $("#shipping_phone").val('');
                    $("#shipping_pincode").val('');
                }    
            });
        });
        function selectPaymentMethod(){
            if($('.stripe').is(':checked') || $('.cod').is(':checked'))
            {
               // alert('checked');
            }
            else
            {
                alert('Please select a payment method!');
                return false;
            }
        }
    </script>
</body>

</html>
