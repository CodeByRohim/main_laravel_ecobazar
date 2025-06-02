@extends('layouts.FrontendLayout')
@section('home')
@section('title',('Home'))
{{-- {{dd($products)}} --}}
        <!------- BANNER STARTS HERE ------->
        <section id="banner">
            <div class="slider">
                <div class="slide">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="bannerImg col-lg-6">
                                <img class=" img-fluid" src="{{asset('Frontend/assets/images/Image-removebg-preview.png')}}" alt="">
                                <div class="circle">
                                    <p>70% <span>OFF</span></p>
                                </div>
                            </div>
                            <div class="col-lg-6 banner-text">
                                <span class="shopery">Welcome to shopery</span>
                                <h3>Fresh & Healthy
                                    Organic Food</h3>
                                <p>Free shipping on all your order. we deliver, you enjoy</p>
                                <button class="customBtn shopBtn d-flex gap-2">Shop Now <span class="rightArrow"><i
                                            class="bi bi-arrow-right-short"></i></span></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="bannerImg col-lg-6">
                                <img class="img-fluid" src="{{asset('Frontend/assets/images/Image-removebg-preview.png')}}" alt="">
                                <div class="circle">
                                    <p>70% <span>OFF</span></p>
                                </div>
                            </div>
                            <div class="col-lg-6 banner-text">
                                <span class="shopery">Welcome to shopery</span>
                                <h3>Fresh & Healthy
                                    Organic Food</h3>
                                <p>Free shipping on all your order. we deliver, you enjoy</p>
                                <button class="customBtn shopBtn d-flex gap-2">Shop Now <span class="rightArrow"><i
                                            class="bi bi-arrow-right-short"></i></span></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="bannerImg col-lg-6">
                                <img class=" img-fluid" src="{{asset('Frontend/assets/images/Image-removebg-preview.png')}}" alt="">
                                <div class="circle">
                                    <p>70% <span>OFF</span></p>
                                </div>
                            </div>
                            <div class="col-lg-6 banner-text">
                                <span class="shopery">Welcome to shopery</span>
                                <h3>Fresh & Healthy
                                    Organic Food</h3>
                                <p>Free shipping on all your order. we deliver, you enjoy</p>
                                <button class="customBtn shopBtn d-flex gap-2">Shop Now <span class="rightArrow"><i
                                            class="bi bi-arrow-right-short"></i></span></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <button class="iconify-icon arrows leftArrows " id="bannerLeftArrow"><iconify-icon
                    icon="pepicons-pencil:arrow-left" width="20" height="20"></iconify-icon></button>
            <button class="iconify-icon arrows rightArrows " id="bannerRightArrow"><iconify-icon
                    icon="pepicons-pencil:arrow-right" width="20" height="20"></iconify-icon></button>
        </section>
        <!--------- BANNER ENDS HERE --------->

       <!--------- FIRST AND SECOND SECTION START --------->
        <section id="first-section d-none d-lg-block"></section>
        <section id="hidden-section d-non d-lg-block">
            <div class="hidden-box">
                <section id="four-boxes-section"> <!-- FOUR BOXES STARTS HERE -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="box col-lg-3 active">
                                <i><img class="rounded img-fluid" src="{{asset('Frontend/assets/images/Icon.svg')}}" alt=""></i>
                                <h3>Free Shipping</h3>
                                <p>Free shipping with discount</p>
                            </div>
                            <div class="box col-lg-3">
                                <i><img class="img-fluid" src="{{asset('Frontend/assets/images/Icon(1).svg')}}" alt=""></i>
                                <h3>Great Support 24/7</h3>
                                <p>Instant access to Contact</p>
                            </div>
                            <div class="box col-lg-3">
                                <i><img class="img-fluid" src="{{asset('Frontend/assets/images/Icon(2).svg')}}" alt=""></i>
                                <h3>100% Sucure Payment</h3>
                                <p>We ensure your money is save</p>
                            </div>
                            <div class="box col-lg-3 radius">
                                <i><img class="img-fluid" src="{{asset('Frontend/assets/images/Icon(3).svg')}}" alt=""></i>
                                <h3>Money-Back Guarantee</h3>
                                <p>30 days money-back guarantee</p>
                            </div>
                        </div>
                    </div>
                </section> <!-- FOUR BOXES ENDS HERE -->
            </div>
        </section>
        <!--------- THIRD SECTION STARTS HERE --------->
        <section id="third-section">
            <div class="container">
                <div class="group-text">
                    <h3 class="text-center">Introducing Our Products</h3>
                    <nav class="d-none d-lg-block">                     

                        <ul class="d-flex align-items-center justify-content-center">
                            <li><a type="button" data-filter="all">All</a></li>
                            @foreach($categories->take(4) as $category)
                            <li ><a type="button" class="" data-filter=".{{ $category->slug}}">{{$category->title}}</a></li>          
                            @endforeach                         
                            <li><a type="button" data-filter="all">View All</a></li>
                        </ul>
                    </nav>
                    <!-- SM ITEM OF PRODUCT STARTS HERE -->
                    <ul class="navbar-nav d-flex align-items-center flex-row gap-3 overflow-scroll categorie d-lg-none">
                        <li class="nav-item">
                            <a class="nav-link" type="button" data-filter="all">All</a>
                        </li>
                         @foreach($categories->take(4) as $category)
                            <li ><a type="button" data-filter="{{ $category->slug}}">{{$category->title}}</a></li>
                            @endforeach
                        
                        <li class="nav-item">
                            <a class="nav-link text-center d-flex" type="button" data-filter="all">View All</a>
                        </li>
                    </ul>
                    <!-- SM ITEM OF PRODUCT ENDS HERE -->
                </div>

                <div class="row mixit">
                @forelse($products as $product)
                    @php
                    $url =  route('frontend.single_product', $product->slug);
                    @endphp
                        <div class="productCard col-lg-3 mix {{ $product->category->slug}}">                   
                            
                                <img class="img-fluid" src="{{ getProductImage($product) }}" alt="{{ $product->title }}">
                                <div class="product-text d-flex align-items-center justify-content-between">
                                   <a href="{{$url}}">
                                    <div class="cnt">
                                        <h3>{{$product->title}}</h3>
                                        <h2>${{$product->selling_price}} <span>${{$product->price}}</span></h2>
                                        <span class="groupStar">
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                        </span>
                                    </div>
                                    </a>
                                    <span
                                        x-data="{ hover: false }"
                                        x-on:mouseenter="hover = true"
                                        x-on:mouseleave="hover = false"
                                        class="bagOverlayCss"
                                        :class="{ 'newBag': hover }"
                                    >
                                        <img
                                            class="img"
                                            :src="hover
                                                ? '{{ asset('Frontend/assets/images/product img/Rectangle.svg') }}'
                                                : '{{ asset('Frontend/assets/images/Rectangle.svg') }}'"
                                            alt="Bag"
                                        >
                                    </span>
                                <div class="overlay">
                                    <div class="sale">
                                        <div class=""><span> <p class="text-start">Sale 50%</p> </span></div>
                                        <div class="heartAndeye">
                                            <div class="heart"><span class="heart-icon"><img width="24px" src="{{asset('Frontend/assets/images/Heart(1).svg')}}" alt=""></span></div>
                                
                                        <a href="{{$url}}">
                                            <div class="eye d-inline-block"><span class="eye-icon"><img width="24px"
                                                        src="{{asset('Frontend/assets/images/product img/Eye 1.svg')}}" alt=""></span></div>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                                        </div>
                            
                    
                    @empty
                    <div class="col-lg-12 text-center">
                        <h3>No Products Found</h3>
                        @endforelse
                   
                </div>
            </div>
           

        </section>
        <!---------THIRD SECTION ENDS HERE --------->

        <!--------- DRINK  SECTION STARTS HERE --------->
        <section id="drink">
            <div class="container d-none d-lg-block">
                <div class="d-flex align-items-center justify-content-center gap-4 cnt">

                    <div class="col-lg-4 milk img-fluid">
                        <div class="milk-breakfast">
                            <h3>100% Fresh
                                <span class="d-block">Cow Milk</span>
                            </h3>
                            <p>Starting at <span>$14.99</span></p>
                            <button class="customBtn drinkBtn">Shop Now <span class="rightArrow"><i
                                        class="bi bi-arrow-right-short"></i></span></button>
                        </div>
                    </div>
                    <div class="col-lg-4 water img-fluid">
                        <div class="wrapper">
                            <p class="">Drink Sale</p>
                            <h3 class="">Water &<span class="d-block">Soft Drink</span></h3>
                            <button class="customBtn drinkBtn  justify-content-lg-end">Shop Now <span
                                    class="rightArrow"><i class="bi bi-arrow-right-short"></i></span></button>
                        </div>
                    </div>
                    <div class="col-lg-4 breakfast img-fluid">
                        <div class="milk-breakfast">
                            <p>100% Organic</p>
                            <h3>100% Fresh
                                <span class="d-block">Cow Milk</span>
                            </h3>
                            <button class="customBtn drinkBtn">Shop Now <span class="rightArrow"><i
                                        class="bi bi-arrow-right-short"></i></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--------- SM DRINK SECTION STARTS HERE --------->
        <div class="d-lg-none">
            <section id="drink">
                <div class="container d-lg-none">
                    <div id="carouselExampleIndicators " class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators ">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="d-flex align-items-center justify-content-center gap-4 cnt">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="col-lg-4 milk img-fluid ">
                                        <div class="milk-breakfast ">
                                            <h3>100% Fresh
                                                <span class="d-block">Cow Milk</span>
                                            </h3>
                                            <p>Starting at <span>$14.99</span></p>
                                            <a href="#">
                                                <button class="customBtn drinkBtn">Shop Now <span class="rightArrow"><i
                                                            class="bi bi-arrow-right-short"></i></span></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="col-lg-4 water img-fluid">
                                        <div class="wrapper">
                                            <p class="">Drink Sale</p>
                                            <h3 class="">Water &<span class="d-block">Soft Drink</span></h3>
                                            <a href="#">
                                                <button class="customBtn drinkBtn  justify-content-lg-end">Shop Now
                                                    <span class="rightArrow"><i
                                                            class="bi bi-arrow-right-short"></i></span></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="col-lg-4 breakfast img-fluid">
                                        <div class="milk-breakfast">
                                            <p>100% Organic</p>
                                            <h3>100% Fresh
                                                <span class="d-block">Cow Milk</span>
                                            </h3>
                                            <a href="#">
                                                <button class="customBtn drinkBtn">Shop Now <span class="rightArrow"><i
                                                            class="bi bi-arrow-right-short"></i></span></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-ico" aria-hidden="true"><i
                                    class="fa-solid fa-arrow-left"></i></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-ico" aria-hidden="true"><i
                                    class="fa-solid fa-arrow-right"></i></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </section>
        </div>
        <!--------- SM DRINK SECTION ENDS HERE --------->
        <!--------- DRINK SECTION ENDS HERE --------->
        <!--------- SPECIAL DEALS START HERE --------->
        <section id="specialDeals">
            <div class="d-flex align-items-center justify-content-center">

                <div class="col-lg-4 col-md-6 productImg text-center">
                    <img class="img-fluid" src="{{asset('Frontend/assets/images/Image(4).svg')}}" alt="">
                </div>

                <div class="col-lg-4 col-md-12 middleSpecial text-center">
                    <p>Best Deals</p>
                    <h2>Our Special Products Deal of the Month</h2>

                    <div class="countDown" id="getting-started">    
                        <div class="countDown-cnt">
                            <h3 id="days">4</h3>
                            <p>DAYS</p>
                        </div>
                        <span>:</span>
                        <div class="countDown-cnt">
                            <h3 id="hours">10</h3>
                            <p>HOURS</p>
                        </div>
                        <span>:</span>
                        <div class="countDown-cnt">
                            <h3 id="minutes">14</h3>
                            <p>MINS</p>
                        </div>
                        <span>:</span>
                        <div class="countDown-cnt">
                            <h3 id="seconds">40</h3>
                            <p>SECS</p>
                        </div>
                    </div>
                    

                    <button class="customBtn shopBtn d-lg-flex gap-2">Shop Now <span class="rightArrow"><i
                                class="bi bi-arrow-right-short"></i></span></button>

                </div>

                <div class=" col-lg-4 col-md-6 productImg2 text-center">
                    <img class="img-fluid" src="{{asset('Frontend/assets/images/Image(5).svg')}}" alt="">
                </div>
            </div>
        </section>
        <!--------- SPECIAL DEALS END HERE --------->
        <!--------- FEUTURED PRODUCT START HERE --------->
        <section id="feuturedProduct">
            <section id="third-section">
                <div class="container">
                    <div class="group-text">
                        <h3 class="text-center">Featured Products</h3>
                    </div>

                    <div class="row">

                        <!-- product 1 start -->
                        <div class="productCard col-lg-3 col-md-4 col-sm-6">
                            <!-- <span class="product-img"> -->
                            <img class="img-fluid" src="{{asset('Frontend/assets/images/green.svg')}}" alt="">
                            <!-- </span> -->
                            <div class="product-text d-flex align-items-center justify-content-between">
                                <div class="cnt">
                                    <h3>Green Apple</h3>
                                    <h2>$14.99 <span>$20.99</span></h2>
                                    <span class="groupStar">
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                    </span>
                                </div>
                                <div class="bag"><span><img src="{{asset('Frontend/assets/images/Rectangle.svg')}}" alt=""></span></div>
                            </div>
                            <div class="overlay">
                                <div class="sale">
                                    <div class=""><span>
                                            <p class="text-start">Sale 50%</p>
                                        </span></div>
                                    <div class="heart"><span class="heart-icon"><img width="24px"
                                                src="{{asset('Frontend/assets/images/Heart(1).svg')}}" alt=""></span></div>
                                </div>
                                <div class="eye d-inline-block"><span class="eye-icon"><img width="24px"
                                            src="{{asset('Frontend/assets/images/product img/Eye 1.svg')}}" alt=""></span></div>
                                <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}"
                                            alt=""></span></div>

                            </div>
                        </div>
                        <!-- products 1 end -->

                        <!-- products 2 start -->
                        <div class="productCard col-lg-3 col-md-4 col-sm-6">
                            <!-- <span class="product-img"> -->
                            <img class="img-fluid" src="{{asset('Frontend/assets/images/malta.svg')}}" alt="">
                            <!-- </span> -->
                            <div class="product-text d-flex align-items-center justify-content-between">
                                <div class="cnt">
                                    <h3>Fresh Indian Malta</h3>
                                    <h2>$20.00</h2>
                                    <span class="groupStar">
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                    </span>
                                </div>
                                <div class="bag"><span><img src="{{asset('Frontend/assets/images/Rectangle.svg')}}" alt=""></span></div>
                            </div>
                            <div class="overlay">
                                <div class="sale">
                                    <div class=""><span>
                                            <p class="text-start">Sale 50%</p>
                                        </span></div>
                                    <div class="heart"><span class="heart-icon"><img width="24px"
                                                src="{{asset('Frontend/assets/images/Heart(1).svg')}}" alt=""></span></div>
                                </div>
                                <div class="eye d-inline-block"><span class="eye-icon"><img width="24px"
                                            src="{{asset('Frontend/assets/images/product img/Eye 1.svg')}}" alt=""></span></div>
                                <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}"
                                            alt=""></span></div>

                            </div>
                        </div>
                        <!-- produts 2 end -->


                        <!-- products 3 start -->
                        <div class="productCard col-lg-3 col-md-4 col-sm-6">
                            <!-- <span class="product-img"> -->
                            <img class="img-fluid" src="{{asset('Frontend/assets/images/chinease cabbage.svg')}}" alt="">
                            <!-- </span> -->
                            <div class="product-text d-flex align-items-center justify-content-between">
                                <div class="cnt">
                                    <h3>Chinese cabbage</h3>
                                    <h2>$12.00 <!--<span>$20.99</span>--></h2>
                                    <span class="groupStar">
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                    </span>
                                </div>
                                <div class="bag"><span><img src="{{asset('Frontend/assets/images/Rectangle.svg')}}" alt=""></span></div>
                            </div>
                            <div class="overlay">
                                <div class="sale">
                                    <div class=""><span>
                                            <p class="text-start">Sale 50%</p>
                                        </span></div>
                                    <div class="heart"><span class="heart-icon"><img width="24px"
                                                src="{{asset('Frontend/assets/images/Heart(1).svg')}}" alt=""></span></div>
                                </div>
                                <div class="eye d-inline-block"><span class="eye-icon"><img width="24px"
                                            src="{{asset('Frontend/assets/images/product img/Eye 1.svg')}}" alt=""></span></div>
                                <div class="bag newBag"><span class=""><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}"
                                            alt=""></span></div>

                            </div>
                        </div>
                        <!-- products 3 end -->


                        <!-- products 4 start -->

                        <div class="productCard col-lg-3 col-md-4 col-sm-6">

                            <img class="img-fluid" src="{{asset('Frontend/assets/images/lettuce.svg')}}" alt="">

                            <div class="product-text d-flex align-items-center justify-content-between">
                                <div class="cnt">
                                    <h3>Green Lettuce</h3>
                                    <h2>$14.99 <!--<span>$20.99</span>--></h2>
                                    <span class="groupStar">
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                    </span>
                                </div>
                                <div class="bag"><span><img src="{{asset('Frontend/assets/images/Rectangle.svg')}}" alt=""></span></div>
                            </div>
                            <div class="overlay">
                                <div class="sale">
                                    <div class=""><span>
                                            <p class="text-start">Sale 50%</p>
                                        </span></div>
                                    <div class="heart"><span class="heart-icon"><img width="24px"
                                                src="{{asset('Frontend/assets/images/Heart(1).svg')}}" alt=""></span></div>
                                </div>
                                <div class="eye d-inline-block"><span class="eye-icon"><img width="24px"
                                            src="{{asset('Frontend/assets/images/product img/Eye 1.svg')}}" alt=""></span></div>
                                <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}"
                                            alt=""></span></div>

                            </div>
                        </div>
                        <!-- products 4 end -->
                        <!-- product 8 start -->
                        <div class="productCard col-lg-3 col-md-4 col-sm-6">

                            <img class="img-fluid" src="{{asset('Frontend/assets/images/eggplant.svg')}}" alt="">

                            <div class="product-text d-flex align-items-center justify-content-between">
                                <div class="cnt">
                                    <h3>Eggplant</h3>
                                    <h2>$14.99 <!--<span>$20.99</span>--></h2>
                                    <span class="groupStar">
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                        <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                    </span>
                                </div>
                                <div class="bag"><span><img src="{{asset('Frontend/assets/images/Rectangle.svg')}}" alt=""></span></div>
                            </div>
                            <div class="overlay">
                                <div class="sale">
                                    <div class=""><span>
                                            <p class="text-start">Sale 50%</p>
                                        </span></div>
                                    <div class="heart"><span class="heart-icon"><img width="24px"
                                                src="{{asset('Frontend/assets/images/Heart(1).svg')}}" alt=""></span></div>
                                </div>
                                <div class="eye d-inline-block"><span class="eye-icon"><img width="24px"
                                            src="{{asset('Frontend/assets/images/product img/Eye 1.svg')}}" alt=""></span></div>
                                <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}"
                                            alt=""></span></div>

                            </div>
                        </div>
                        <!-- product 5 end -->

                    </div>
                </div>
            </section>
        </section>
        <!--------- FEUTURED PRODUCT END HERE --------->
        <!--------- REVIEW SECTION START --------->
        <section id="review">
            <div class="container ">
                <h2>What our Clients Says</h2>

                <div class="d-flex justify-content-center overflow">


                    <div class="col col-md-6 col-lg-4 reviewBox ">
                        <div class="wrapper ">
                            <span><img class="img-fluid" src="{{asset('Frontend/assets/images/Vector.svg')}}" alt=""></span>
                            <p>“Nam sed odio diam. Mauris sagittis sapien sed convallis cursus. Proin mattis ultrices
                                urna ac eleifend. Cras vel nisi nec lectus sagittis venenatis. Curabitur laoreet leo sed
                                lorem pulvina”</p>
                            <span><i class="fa-solid fa-caret-up"></i></span>
                        </div>
                        <div class="customer">
                            <img class="img-fluid" src="{{asset('Frontend/assets/images/]enny.svg')}}" alt="">
                            <h4>Jenny Wilson</h4>
                            <h5>Customer</h5>
                        </div>
                    </div>
                    <div class="col col-md-6 col-lg-4 reviewBox ">
                        <div class="wrapper ">
                            <span><img class="img-fluid" src="{{asset('Frontend/assets/images/Vector.svg')}}" alt=""></span>
                            <p>“Proin sed neque nec tellus malesuada ultrices eget a justo. Nullam a nibh faucibus,
                                semper risus ac, ultricies est. Maecenas eget purus in enim imperdiet dapibus in ac mi.
                                Fusce faucibus lacus felis”</p>
                            <span><i class="fa-solid fa-caret-up"></i></span>
                        </div>
                        <div class="customer">
                            <img class="img-fluid" src="{{asset('Frontend/assets/images/howkins.svg')}}" alt="">
                            <h4>Guy Hawkins</h4>
                            <h5>Customer</h5>
                        </div>
                    </div>
                    <div class="col col-md-6 col-lg-4 reviewBox">
                        <div class="wrapper">
                            <span><img class="img-fluid" src="{{asset('Frontend/assets/images/Vector.svg')}}" alt=""></span>
                            <p>“Nam sed odio diam. Mauris sagittis sapien sed convallis cursus. Proin mattis ultrices
                                urna ac eleifend. Cras vel nisi nec lectus sagittis venenatis. Curabitur laoreet leo sed
                                lorem pulvina”</p>
                            <span><i class="fa-solid fa-caret-up"></i></span>
                        </div>
                        <div class="customer">
                            <img class="img-fluid" src="{{asset('Frontend/assets/images/morphy.svg')}}" alt="">
                            <h4>Kathryn Murphy</h4>
                            <h5>Customer</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="containe d-flex justify-content-center">
                <section id="videos"> <!--video section-->
                    <div class="video-container">
                        
                       <a title="Our Food Video" class="venobox" href="./video/istockphoto-2123071364-640_adpp_is.mp4" ><img class="img-fluid" src="{{asset('Frontend/assets/images/organicPhoto.svg')}}" alt="Promo Video"></a>

                        <div class="thumbnail-text">
                            <h6>Video</h6>
                            <p>We’re the Best Organic Farm in the World</p>
                            <span class="d-none d-lg-block"><i class="fa-solid fa-circle-play img-fluid"></i></span>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <!--------- REVIEW SECTION END --------->
        <!---------LATEST NEWS SECTION START --------->
        <section id="latestNews">
            <h2>Latest News</h2>
            <div class="container">
                <div class="customRow">
                    <div class="col-lg-4 latestNewsBox">
                        <div class="childBox">
                            <img class="img-fluid" src="{{asset('Frontend/assets/images/orange.svg')}}" alt="">
                            <span class="text">
                                <h3>23</h3>
                                <p>JAN</p>
                            </span>
                        </div>
                        <h3 class="curabitur">Curabitur porttitor orci eget neque accumsan venenatis.</h3>
                        <p class="nulla">Nulla libero lorem, euismod venenatis nibh sed, sodales dictum ex. Etiam nisi
                            augue, malesuada et pulvinar at, posuere eu neque.</p>
                        <span><a href="#">Read More <span class="rightArrow"><i
                                        class="bi bi-arrow-right-short"></i></span></a></span>
                    </div>

                    <div class="col-lg-4 latestNewsBox">
                        <div class="childBox">
                            <img class="img-fluid" src="{{asset('Frontend/assets/images/mangojuice.svg')}}" alt="">
                            <span class="text">
                                <h3>23</h3>
                                <p>JAN</p>
                            </span>
                        </div>
                        <h3 class="curabitur">Curabitur porttitor orci eget neque accumsan venenatis.</h3>
                        <p class="nulla">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit
                            officia consequat duis enim velit mollit. </p>
                        <span><a href="#">Read More <span class="rightArrow"><i
                                        class="bi bi-arrow-right-short"></i></span></a></span>
                    </div>

                    <div class="col-lg-4 latestNewsBox">
                        <div class="childBox">
                            <img class="img-fluid" src="{{asset('Frontend/assets/images/pineapple.svg')}}" alt="">
                            <span class="text">
                                <h3>23</h3>
                                <p>JAN</p>
                            </span>
                        </div>
                        <h3 class="curabitur">Curabitur porttitor orci eget neque accumsan venenatis.</h3>
                        <p class="nulla">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit
                            officia consequat duis enim velit mollit.</p>
                        <span><a href="#">Read More <span class="rightArrow"><i
                                        class="bi bi-arrow-right-short"></i></span></a></span>
                    </div>
                </div>
            </div>
        </section>
       <!---------  LATEST NEWS SECTION END --------->
@endsection