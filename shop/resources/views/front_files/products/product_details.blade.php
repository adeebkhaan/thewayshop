@extends('front_files.master')

@section('content')
<header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('resources/frontend/images/logo.png')}}" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Categories</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                        @foreach($categories as $category)
                                        <div class="col-menu col-md-2">
                                            <h6 class="title">{{ $category->name }}</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    @foreach($category->categories as $subcategory)
                                                    <li>
                                                        <a href="{{url('/categories/'.$subcategory->id)  }}">{{ $subcategory->name }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                          
                                        </div>
                                         @endforeach 
                                        <!-- end col-3 -->
                                        <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <!-- End Atribute Navigation -->
            </div>
            
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

<!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $productDetails->product_name }}</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/')}}">TheWayShop</a></li>
                        <li class="breadcrumb-item active">{{ $productDetails->product_name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{ url('/') }}/uploads/products/{{ $productDetails->product_image }}" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{ url('/') }}/uploads/products/{{ $productDetails->product_image }}" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{ url('/') }}/uploads/products/{{ $productDetails->product_image }}" alt="Third slide"> </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-xl-7 col-lg-7 col-md-6">
                     @if(session('error'))
                        <div class="alert alert-danger">
                        {{ session('error') }}
                        </div>
                    @endif
                     @if(count($errors) > 0)
                    <div class="alert alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif
                    <form name="addtoCart" method="post" action="{{ url('/add-cart') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                    <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
                    <input type="hidden" name="product_colour" value="{{ $productDetails->product_colour }}">
                    <input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
                    <input type="hidden" id="price" name="product_price" value="{{ $productDetails->product_price }}">
                    
                    <div class="single-product-details">
                        <h2> Product Name : {{ $productDetails->product_name }}</h2>
                        <h5 id="getPrice"> Price : Rs {{ $productDetails->product_price }}</h5>
                        <p class="available-stock"><span> More than 20 available / <a href="#">8 sold </a></span>
                            <p>
                                <h4>Short Description:</h4>
                                <p>{{ $productDetails->product_description }} </p>
                                <ul>
                                        <li>
                                        <div class="form-group size-st">
                                            <label class="size-label">Size</label>
                                                <select id="selSize" name="product_size" class="selectpicker show-tick form-control">
    								            <option value="0">Size</option>
                                                @foreach($productDetails->attributes as $sizes)
                                                <option value="{{ $productDetails->id }}-{{ $sizes->size }}">{{ $sizes->size }}</option>
                                                @endforeach
    							                </select>
                                        </div>
                                        </li>
                                    <li>
                                        <div class="form-group quantity-box">
                                            <label class="control-label">Quantity</label>
                                            <input class="form-control" name="product_quantity" value="1" min="1" max="5" type="number">
                                        </div>
                                    </li>
                                </ul>

                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                        <button class="btn hvr-hover" data-fancybox-close="" type="submit" style="color: white;">Add to cart</button>
                                    </div>
                                </div>

                                <div class="add-to-btn">
                                    
                                    <div class="share-bar">
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>
    <!-- End Cart -->

@endsection