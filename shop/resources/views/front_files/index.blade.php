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
                        <li class="nav-item"><a class="nav-link" href="{{ url('/about-us') }}">About Us</a></li>
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
                        <li class="nav-item"><a class="nav-link" href="{{ url('/contact-us') }}">Contact Us</a></li>
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



<div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            @foreach($banners as $banner)
            <li class="{{ $banner->text_style }}">
                <img src="{{ url('/') }}/uploads/banners/{{ $banner->image }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong> {!! $banner->name !!} </strong></h1>
                            <p class="m-b-40">{{ $banner->content }}</p>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                @foreach($categories as $category)
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#{{ $category->id }}" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">{{ $category->name }} <small class="text-muted"></small>
                                </a>
                                    <div class="collapse" id="{{ $category->id }}" data-parent="#list-group-men">
                                        <div class="list-group">
                                            @foreach($category->categories as $subcategory)
                                            <a href="{{url('/categories/'.$subcategory->id)  }}" class="list-group-item list-group-item-action ">{{ $subcategory->name }} </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach($products as $product)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="{{ url('uploads/products')}}/{{ $product->product_image }}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        
                                                        <a class="cart" href="{{ url('product-details') }}/{{$product->id}}">Product Details</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>{{ $product->product_name }}</h4>
                                                    <h5>Rs : {{ $product->product_price }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Products  -->


@endsection