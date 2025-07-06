<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     {{-- Meta Description --}}
    <meta name="description" content="@yield('meta_description', 'Buy quality products at affordable prices. Fast delivery, secure payment, and trusted customer service.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}} - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="shortcut icon" href="{{asset('Frontend/assets/img/fav.png" type="image/x-icon')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/contact.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/productDetails.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/checkout.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/shop.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/shopping cart.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/sign and sign up.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/wishlist.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/about.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/blog.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/jquery.ez-plus.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/prism.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('Frontend/assets/css/style.css')}}"> --}}

    <link rel="stylesheet" href="{{asset('Frontend/assets/css/responsive.css')}}">
     <link rel="stylesheet" href="{{asset('Frontend/assets/css/newsletter and footer.css')}}">
     <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body>
    <!-- PRELOADER START HERE -->
    {{-- <div id="preloader">
        <div class="spinner"></div>
    </div> --}}
    <!-- PRELOADER END HERE -->
      <!-- HEADER STARTS HERE -->
    <header>
        <!-- HEADER TOP STARTS -->
        <section id="headerTop">
            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-6 r">
                        <p class="d-flex align-items-center justify-content-center justify-content-lg-start">
                            <span class="iconify-icon "><iconify-icon icon="system-uicons:location" width="17"
                                    height="20"></iconify-icon></span>
                            Store Location: Lincoln- 344, Illinois, Chicago, USA
                        </p>
                    </div>


                    <div class="col-lg-6 text-end d-none d-lg-block">
                        <ul>
                            <li class="d-inline-block">
                                <form action="">
                                    <select>
                                        <option value="">Eng</option>
                                        <option value="">Bng</option>
                                    </select>
                                    <select>
                                        <option value="">USD</option>
                                        <option value="">BDT</option>
                                    </select>
                                </form>
                            </li>
                            <li class="d-inline-block">
                                <a href="{{route('customer.login')}}">Sign In / Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- HEADER TOP ENDS -->
        <!-- HEADER MIDDLE STARTS -->
        <section id="headerMiddle">
            <div class="container d-none d-lg-block">
                <div class="row align-items-center">
                    <div class="logo col-lg-3"><img class="img-fluid" src="{{asset('Frontend/assets/images/Logo.svg')}}" alt="Logo"></div>

                    <div class="search col-lg-6 ">
                        <form id="search" class="" action="{{route('frontend.search')}}" method="GET">
                            @csrf
                            <div class="formGroup d-sm-none d-lg-block">
                                <span class="iconify-icon">
                                    <iconify-icon icon="weui:search-outlined" width="20" height="21"></iconify-icon>
                                </span> 
                                <input type="search" value="{{ request()->search ?? '' }}" name="search" placeholder="Search">
                                 <div class="searchResults position-absolute mb-0 bg-white w-100 p-3 rounded" style="display: none; z-index: 999;">
                                       <ul>
                                                                               
                                       </ul>
                                   </div>
                            </div>
                            <button type="submit">Search</button>
                            <!-- Display Results -->
                                  
                        </form>
                    </div>

                    <div class="quickLinks col-lg-3 d-sm-none d-lg-block">
                        <ul class="text-center">

                            <li class="d-inline-block"><a href="./wishlist.php">
                                    <span class="iconify-icon">                                       
                                        <img class="img-fluid" width="30" height="32" src="{{asset('Frontend/assets/images/circum--heart.svg')}}" alt="Heart Icon">
                                    </span>
                                    </span></a></li>
                            <li class="d-inline-block">
                                
                                    <div class="d-flex cart cart-icon" onclick="toggleCart()">
                                        <div class="cartIcon">
                                            <span class="iconify-icon">
                                                <img class="img-fluid" width="34" height="26" src="{{asset('Frontend/assets/images/Rectangle.svg')}}" alt="">
                                                @if(Auth::guard('customer')->check() || Auth::guard('web')->check())
                                                    <span class="cartCount">{{ $cartCount }}</span>
                                                @else
                                                    <span class="cartCount">0</span>
                                                @endif
                                                <span>
                                        </div>
                                        <div class="text">
                                            <span class="d-flex">Shopping cart:</span>
                                            <h4 class="text-start" id="cartTotal">0</h4>
                                        </div>
                                    </div>
                               
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- SM MIDDLE NAVBAR START HERE -->

            <div class="container smMiddle d-lg-none">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="menuSm">
                        <a href="#smSidebar" data-bs-toggle="offcanvas" role="button" aria-controls="smSidebar">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo"><img class="img-fluid" src="{{asset('Frontend/assets/images/Logo.svg')}}" alt="Logo"></div>
                    <div class="smSearchBtn">
                        <button class="searchIcon"><span><i class="bi bi-search"></i></span></button>
                        <button class="closeIcon" style="display: none;"><span><i
                                    class="bi bi-x-lg"></i></span></button>
                    </div>
                </div>


                <!-- SM MENU OFFCANVAS START HERE -->
                <div class="offcanvas smSidebar offcanvas-start" tabindex="-1" id="smSidebar"
                    aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header justify-content-between">
                        <span class="offcanvas-title" id="offcanvasExampleLabel"><img class="img-fluid"
                                src="{{asset('Frontend/assets/images/Logo.svg')}}" alt="Logo"></span>
                        <button type="button" class=" closeBtn justify-content-end" data-bs-dismiss="offcanvas"
                            aria-label="Close"><i class="bi bi-x-lg"></i></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="" aria-labelledby="">
                            <li class=""><a class="d-flex justify-content-between align-items-center"
                                    href="index.php">Home <i class="fa-solid fa-angle-right"></i></a></li>

                            <li class="">
                                <div class="dropdown">
                                    <a href="./shop.php" class="dropdownBtn d-flex justify-content-between align-items-center"
                                         id="dropdownMenuButton1" data-bs-toggle="dropdow"
                                        aria-expanded="false">
                                        Shop <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Fish</a></li>
                                        <li><a class="dropdown-item" href="#">Meat</a></li>
                                        <li><a class="dropdown-item" href="#">Fruit</a></li>
                                        <li><a class="dropdown-item" href="#">Vegetable</a></li>
                                        <li><a class="dropdown-item" href="#">Organic Vegetable</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class=""><a class="d-flex justify-content-between align-items-center" href="./productdetails.php">Pages <i class="fa-solid fa-angle-right"></i></a></li>
                            <li class=""><a class="d-flex justify-content-between align-items-center" href="{{route('blog')}}">Blog <i class="fa-solid fa-angle-right"></i></a></li>
                            <li class=""><a class="d-flex justify-content-between align-items-center" href="{{route('about')}}">About Us
                                    <i class="fa-solid fa-angle-right"></i></a></li>
                            <li class=""><a class="d-flex justify-content-between align-items-center"
                                    href="{{route('contact')}}">Contact Us <i class="fa-solid fa-angle-right"></i></a></li>

                            <div class="d-flex align-items-center justify-content-evenly mt-3">

                                <li><a href="tel:+219-555-0114"><img src="{{asset('Frontend/assets/images/Group.svg')}}" alt="Group Icon">(219) 555-0114</a>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
                <!-- SM MENU OFFCANVAS ENDS HERE -->

                <!--sm container-->
                <!-- SM MIDDLE NAVBAR ENDS HERE -->
                <!-- search in sm starts-->
                <section id="">
                    <div class="smMsearch d-none">
                        <div class="search">
                            <form class="" action="">
                                <div class="formGroup d-flex">
                                    <span class="iconify-icon text-end"><iconify-icon icon="weui:search-outlined"
                                            width="20" height="21"></iconify-icon></span>
                                    <input type="search" placeholder="Search">
                                    <button>Search</button>
                                </div>
                            </form>
                            <div class="searchResult">
                                <p class="result">Total results 250</p>
                                <div class="row">
                                    <!-- Product Cards -->
                                    <div class="col-6">
                                        <div class="product-card">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/Image.svg')}}" alt="Product Image">
                                                </a>
                                            </div>
                                            <div class="product-text">
                                                <p>Mango</p>
                                                <h4>14.99 <del>20.99</del></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Repeat as necessary -->
                                    <div class="col-6">
                                        <div class="product-card">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="img-fluid" src="{{asset('Frontend/assets/images/chinease cabbage.svg')}}" alt="cabbage Image">
                                                </a>
                                            </div>
                                            <div class="product-text">
                                                <p> cabbage</p>
                                                <h4>14.99 <del>20.99</del></h4>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="product-card">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/Image.svg')}}" alt="Product Image">
                                                </a>
                                            </div>
                                            <div class="product-text">
                                                <p>Mango</p>
                                                <h4>14.99 <del>20.99</del></h4>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="product-card">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/Image.svg')}}" alt=" Product Image">
                                                </a>
                                            </div>
                                            <div class="product-text">
                                                <p>Mango</p>
                                                <h4>14.99 <del>20.99</del></h4>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- search in sm ends  -->
        </section>
        <!-- HEADER MIDDLE ENDS -->
        <!-- HEADER BOTTOM STARTS -->
        <section id="headerBottom">
            <div class="container d-lg-block">
                <div class="row">
                    <div class="col-lg-2 d-none d-lg-block">
                    <form id="categoryForm" class="category-form">
                        <div class="d-flex align-items-center">
                            <span class="iconify-icon">
                                <img src="{{ asset('Frontend/assets/images/menu 1.svg') }}" alt="Menu Icon" width="24" height="24">
                            </span>
                            <select id="categorySelect" name="category" class="form-selects">
                                <option value="" class="selected">All Categories</option>
                                
                                @foreach($categories as $category)
                                    <option value="{{ route('frontend.categories.products', $category->slug) }}">
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="down"><i class="bi bi-chevron-down"></i></span>
                        </div>
                    </form>


                    </div>
                    <!-- SM ALL CATEGORIES START -->
                    <ul
                        class="navbar-nav d-flex align-items-center flex-row gap-3 overflow-scroll categories d-lg-none categorie">
                          @forelse($categories as $category)                      
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('frontend.categories.products',  $category->slug)}}"> {{ $category->title }}</a>
                                    </li>    
                                    @empty
                                     <li class="nav-item m-auto">
                                        <a class="nav-link " href="#"> No Categories Found
                                        </a>
                                    </li>
                            @endforelse

                    </ul>
                    <!------ SM ALL CATEGORIES END ------->
                   
                    <div class="col-lg-8 d-none d-lg-block">
                        <div class="container">

                            <div class="row">
                                <nav class="navbar-expand-lg ">
                                    <ul class="d-flex align-items-center justify-content-lg-start">
                                        <li class="nav-item"><a href="{{route('home')}}" class="nav-link">Home<span class="down"><i
                                                        class="bi bi-chevron-down"></i></span></a>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a href="{{route('category.archive')}}" class="nav-link" id="homeDropdown"
                                                data-bs-toggle="dropdow" aria-expanded="fals">Shop<span
                                                    class="down"><i class="bi bi-chevron-down"></i></span>
                                                </a>
                                            <ul class="dropdown-menu" aria-labelledby="homeDropdown">                                                
                                                <li><a class="dropdown-item" href="#">HoneyS</a></li>
                                                <li><a class="dropdown-item" href="#">Poultry & Meat</a></li>
                                                <li><a class="dropdown-item" href="#">Nuts & Dates</a></li>
                                                <li><a class="dropdown-item" href="#">Spices</a></li>
                                                <li><a class="dropdown-item" href="#">Super Food</a></li>
                                                <li><a class="dropdown-item" href="#">Tea & Coffee</a></li>
                                            </ul>
                                        </li>


                                       @isset($product)
                                            <li class="nav-item">
                                                <a href="{{ route('frontend.single_product', $product->slug) }}" class="nav-link">
                                                    Pages <span class="down"><i class="bi bi-chevron-down"></i></span>
                                                </a>
                                            </li>
                                        @endisset

                                        <li class="nav-item"><a href="{{route('blog')}}" class="nav-link">Blog<span class="down"><i
                                                        class="bi bi-chevron-down"></i></span></a></li>
                                        <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About Us<span class="down"><i
                                                        class="bi bi-chevron-down"></i></span></a></li>
                                        <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact Us<span
                                                    class="down"><i class="bi bi-chevron-down"></i></span></a></li>
                                                        
                                    </ul>
                            </div>
                            </nav>
                        </div>
                    </div>


                    <div class="col-lg-2 d-none d-lg-block">
                        <div class="container">
                            <div class="row">
                                <a href="tel:+219-555-0114">
                                    <p class="contact"><span><img class="phone" src="{{asset('Frontend/assets/images/Group.svg')}}"
                                                alt=""></span>(219)
                                        555-0114</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- HEADER BOTTOM ENDS -->
        <!-- SM BOTTOM NAVBAR START HERE -->
        <section id="smBottomNav" class="d-lg-none">
            <div class="container">

                <div class="d-flex align-items-center justify-content-evenly">
                    <a href="./index.php" class="iconify-icon actives
                        "><img class="img-fluid" width="25" height="22" src="{{asset('Frontend/assets/images/mdi-light--home.svg')}}" alt="">
                    </a>

                    <a href="./wishlist.php" class="iconify-icon actives
                        "><img class="img-fluid" width="25" height="22" src="{{asset('Frontend/assets/images/mdi-light--heart.svg')}}" alt="">
                    </a>

                    <a href="./shopping cart.php" class="iconify-icon actives"><img width="29" height="22"
                            src="{{asset('Frontend/assets/images/lets-icons--bag-alt-light.svg')}}" alt="">
                    </a>
                    <a href="./dashboard.php" class="iconify-icon actives
                        "><img class="img-fluid" width="25" height="25"
                            src="{{asset('Frontend/assets/images/material-symbols-light--account-circle-outline.svg')}}" alt="">
                    </a>
                </div>
            </div>
        </section>
       
         
        <!-- SM BOTTOM NAVBAR END HERE -->
    </header>
    <!-- HEADER ENDS HERE -->
     <main>
   @yield('home')
   @yield('signIn')
   @yield('signUp')
   @yield ('about')
   @yield('contact')
   @yield('shop')
   @yield('single_product')
   @yield('blog')
   @yield('addToCart')
   @yield('checkout')
   @yield('user-dashboard')
   @yield('contentEmail')
     </main>
      <!-- NEWSLETTER SECTION START -->

 <section id="newsletter">
            <div class="container">
                <div class="cntWrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-3 logo text-center text-lg-start">
                            <img class="img-fluid" src="{{asset('Frontend/assets/images/Logo.svg')}}" alt="">
                        </div>

                        <div class="col-lg-4 text text-center text-lg-start">
                            <h2 class="text-center text-lg-start">Subcribe our Newsletter</h2>
                            <p>Pellentesque eu nibh eget mauris congue mattis matti.</p>
                        </div>

                        <div class="col-lg-5 inputField">
                            <form action="formInput">
                                <input type="email" placeholder="Your email address">
                                <button type="submit">Subscribe</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
</section>
        <!-- NEWSLETTER SECTION END -->
        <!-- FOOTER SECTION START -->
        <section id="footer">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="wrapper">
                            <!-- 3 -->
                            <div class="col-lg-3">
                                <h3 class="text-center text-lg-start">About Shopery</h3>
                                <p class="text-center text-lg-start">
                                    Morbi cursus porttitor enim lobortis molestie. Duis gravida turpis dui, eget
                                    bibendum magna congue nec.
                                </p>
                                <h5 class="text-center text-lg-start"> (219) 555-0114<span
                                        class="text-center">or</span>Proxy@gmail.com</h5>
                            </div>
                            <!-- 4 -->
                            <div class="col-4 col-lg-2 mx- myAccount">
                                <h3 class="text-center text-lg-start">My Account</h3>
                                <ul class="text-center text-lg-start">
                                    <li><a href="{{route('frontend.userDashboard')}}">My Account</a></li>
                                    <li><a href="./checkout.php">Order History</a></li>
                                    <li><a href="./shopping cart.php">Shoping Cart</a></li>
                                    <li><a href="./wishlist.php">Wishlist</a></li>
                                    <li><a href="./dashboard.php">Settings</a></li>
                                </ul>
                            </div>
                            <div class="col-4 col-lg-2">
                                <h3 class="text-center text-lg-start">Helps</h3>
                                <ul class="text-center text-lg-start">
                                    <li><a class="text-end text-lg-start" href="{{route('contact')}}">Contact</a></li>
                                    <li><a class="text-end text-lg-start" href="#">Faqs</a></li>
                                    <li><a class="text-end text-lg-start" href="#">Terms & Condition</a></li>
                                    <li><a class="text-end text-lg-start" href="#">Privacy Policy</a></li>
                                    <!-- <li><a href="#"></a></li>        -->
                                </ul>
                            </div>
                            <div class="col-lg-2 col-4">
                                <h3>Proxy</h3>
                                <ul>
                                    <li><a href="./about.php">About</a></li>
                                    <li><a href="./shop.php">Shop</a></li>
                                    <li><a href="./productdetails.php">Product</a></li>
                                    <li><a href="./productdetails.php">Products Details</a></li>
                                    <li><a href="#">Track Order </a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 mx- myAccount">
                                <h3 class="">Instagram</h3>
                                <ul class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                                    <li><a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/ins4.svg')}}" alt=""></a></li>
                                    <li><a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/ins5.svg')}}" alt=""></a></li>
                                    <li><a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/ins6.svg')}}" alt=""></a></li>
                                    <li><a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/Image(7).svg')}}" alt=""></a>
                                    </li>
                                    <li><a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/Image(8).svg')}}" alt=""></a>
                                    </li>
                                    <li><a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/Image(9).svg')}}" alt=""></a>
                                    </li>
                                    <li><a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/Image(10).svg')}}" alt=""></a>
                                    </li>
                                    <li><a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/Image(11).svg')}}" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <hr class="footerHr">

                        <div class="social-payment">
                            <div class="col-lg-4 social">
                                <a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/facebook 1.svg')}}" alt=""></a>
                                <a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/twitter 1.svg')}}" alt=""></a>
                                <a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/pinterest 1.svg')}}" alt=""></a>
                                <a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/instagram 1.svg')}}" alt=""></a>
                            </div>
                            <div class="col-lg-4">
                                <p>Shopery eCommerce © 2021. All Rights Reserved</p>
                            </div>
                            <div class="col-4 payment text-end">
                                <a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/Method=ApplePay.svg')}}" alt=""></a>
                                <a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/Method=Visa.svg')}}" alt=""></a>
                                <a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/Method=Discover.svg')}}" alt=""></a>
                                <a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/Method=Mastercard.svg')}}" alt=""></a>
                            </div>
                        </div>


                    </div>
                </div>
            </footer>
        </section>
        <!-- FOOTER SECTION END -->
  <div class="cart-popup" id="cartPopup">
    <div class="popupWrap">
        <span class="close-btn" style="font-size: 20px;" onclick="toggleCart()">✖</span>
        
        <div id="cartItems">
         <div id="cartItemsContainer">
        
        </div>
        </div>
    </div>
  </div>
 </section>

    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script> 
    <script src="{{asset('Frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('Frontend/assets/js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('Frontend/assets/js/slick.min.js')}}"></script>
    <script src="{{asset('Frontend/assets/js/mixitup.min.js')}}"></script>
    <script src="{{asset('Frontend/assets/js/venobox.min.js')}}"></script>
    <script src="{{asset('Frontend/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('Frontend/assets/js/jquery.ez-plus.js')}}"></script>
    <script src="{{asset('Frontend/assets/js/prism.js')}}"></script>
    <script src="{{asset('Frontend/assets/js/web.js')}}"></script>

    <script src="{{asset('Frontend/assets/js/app.js')}}"></script>
    <script>
        $(document).ready(function(){
           $('#search input[type="search"]').keyup(function(){
            let value = $(this).val()
            if(value.length >= 3){
                // ajax
                $.ajax({
                    method: 'GET',
                    url: '{{ route('frontend.live_search') }}',
                    data: {search: value},
                   
                    success: function(data){
                         let  HTML = [];
                    if(data.length > 0){
                        data.forEach(item => {
                        let url = '{{ route('frontend.single_product', '::slug') }}'
                        url = url.replace('::slug', item.slug)
                        let li = `<li><a class="my-2" href="${url}">${ item.title }</a></li>`;
                        HTML.push(li)
                        }),
                    
                        $('.searchResults ul').html(HTML.join(''))
                        $('.searchResults').slideDown();
                      }
                   },

                    error: function(xhr,status,error){
                       
                    }

                })
            }
            
            if(value.length == 0){
                 $('.searchResults ul').html('')
                $('.searchResults').slideUp();
            }
           })
        })
    

    function toggleCart() {
      const popup = document.getElementById('cartPopup');
      popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
      updateCartUi();
    }

   function updateCartUi(){
    $.ajax({
        method: 'GET',
        url: `{{ route('cart.summery') }}`,
        success: function(res){
            if(res.status === 'success'){
                let cart = res.cart
                let total = res.total
                let products = res.products
                let msg = res.msg

                $('#cartTotal').text(res.total);
                $('.cartCount').text(cart.length); 

                let html = `
                    <h3 class="mb-4">Shopping Cart (${cart.length})</h3>
                `;

                cart.forEach(function(item) {
                    html += `
                        <div class="cart-item gap-3">
                            <div class="cart-img">
                                <img class="img-fluid product-image" width="120" height="100" src="${item.product.featured_image ?? getImage()}" alt="${item.product.title}">
                            </div>
                            <div class="cart-text d-flex flex-column">
                                <span class="itemName">${item.product.title}</span>
                                <span class="itemQty">${item.qty} *  <span class="itemPrice">$${(item.product.selling_price ?? item.product.price) * item.qty}</span></span>
                            </div>
                            <div style="margin-left:auto;">
                                <a href="javascript:void(0);" class="close-btn remove-from-cart" data-id="${item.product.id}">✖</a>
                            </div>
                        </div>
                        <hr>
                    `;
                });

                html += `
                    <div class="cartLink">
                        <div class="d-flex justify-content-between flex-row">
                            <p class="cartCount">${cart.length} ${cart.length > 1 ? 'products' : 'product'}</p>             
                            <span>${total} TK.</span> 
                        </div>
                        <div class="gap-2 d-flex flex-column">
                            <a class="text-center mt-2" href="{{ route('checkout') }}"><button class="button">Checkout</button></a>
                            <a class="text-center mt-2" href="{{ route('cart') }}" data-id="${cart.userable_id}"><button class="button">Go To Cart</button></a>
                        </div>
                    </div>
                `;

                $('#cartItemsContainer').html(html); 
            }
        },
        error: function(xhr){
            if (xhr.status === 401) {
                // Unauthorized user fallback UI
                const html = `
                    <div class="text-center p-4">
                        <i class="bx bx-lock-alt" style="font-size: 40px; color: #dc3545;"></i>
                        <h5 class="mt-2 text-danger">You are not logged in</h5>
                        <p>Please log in to view your cart.</p>
                        <a href="/customer/login" class="btn btn-primary mt-3">Login</a>
                    </div>
                `;
                $('#cartItemsContainer').html(html);
                $('.cartCount').text('0');
                $('#cartTotal').text('0');
            } else {
                console.log(xhr);
            }
        },
    });
}

    // Enable CSRF token for all Ajax
    $(document).ready(function (){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    // Remove from cart click handler
 $(document).on('click', '.remove-from-cart', function (e) {
        e.preventDefault();
        let $this = $(this);
        const productId = $(this).data('id');
        $.ajax({
            url: '/remove-from-cart/' + productId,
            type: 'DELETE',
            success: function (response) {
                if (response.status === 'success') {
                     Swal.fire({
                    title: "Product cart remove successfully!",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 2000
                    });
            
                // Remove cart item from DOM
                $this.closest('.cart-item').remove();
               
                  let newCount = $('.cart-item').length;
                  $('.cartCount').text(newCount);
                  updateCartUi(); 
                   
                } else {
                    alert('Failed to remove item');
                }
            },
            error: function (xhr) {
                console.error(xhr);
            }
        });
         console.log(productId)
    });

});

    // Add To Cart
    $(document).on('click', '.addToCartBtn', function(e){
        e.preventDefault();
        const url = $(this).attr('href');
        $.ajax({
            method: 'GET',
            url: url,
            success: function(res){
                Swal.fire({
                title: "Product added successfully!",
                icon: "success",
                showConfirmButton: false,
                timer: 2000
                });
           
             
             updateCartUi();
             
            },
            error: function(error){
                console.log(error)
            }

        })
    });
   
    // image zoom
   $('.zoom_mw').ezPlus({
    scrollZoom: true
});



  </script> 
  @stack('scripts')
</body>
</html>