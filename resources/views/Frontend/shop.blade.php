
@extends('layouts.FrontendLayout')
@section('shop')
@section('title', 'Shop')

 <!-- Breadcrumbs Start Here -->
 <section id="Breadcrumbs">
   <div class="container">
      <ul>
         <li class="d-flex align-items-center">
            <a href="{{route('home')}}" class="homeIcom">
               <iconify-icon icon="fluent:home-16-regular" width="20" height="22"></iconify-icon>
            </a>
            <iconify-icon icon="formkit:right" width="15" height="15" style="color: #999"></iconify-icon>
         </li>
         <li class="d-flex align-items-center">
            <a href="#" class="activ">Shop</a>
         </li>
      </ul>
   </div>
</section>
<!-- Breadcrumbs End Hear -->
<!-- SHOP FILTER START HERE -->
<section id="shopFilter">
    <div class="container">
        <div class="row filterRow">
            <!-- Filter Button -->
            <div id="toggleButton" class="filter col-lg-3 col-2">
                <button class="filterBtn">
                    Filter 
                    <iconify-icon class="iconify-icon" icon="rivet-icons:filter"></iconify-icon>
                </button>
            </div>
            
            <!-- Sort Dropdown -->
            <div class="sortDropdown col-lg-7 col-10 text-center d-flex justify-content-end justify-content-lg-start">
                <div class="product-select input-group">
                    <label class="input-group-text" for="inputGroupSelect01">Sort by:</label>
                    <select class="form-select" id="inputGroupSelect01" aria-label="Sort Products">
                        <option selected>Latest</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
            </div>
            
            <!-- Results Found -->
            <div class="col-lg-2 col-12 shopResult text-start text-lg-end">
                <p class="mb-0">52<span> Results Found</span></p>
            </div>

            <!-- Left side of the filter -->
            
                <div id="leftContent"  class="left-content col col-md-3 filterLeftSideCategories d-lg-block">
                    <div id="leftHeader" class="left-header d-lg-none d-flex justify-content-between align-items-center">
                        <!-- <span>Product Filter</span> -->
                         <a href="./index.html"><img class="img-fluid" src="{{asset('Frontend/assets/images/Logo.svg')}}" alt=""></a>
                        <span id="closeFilter" class="closeFilter"><i class="fa-solid fa-xmark"></i></span>
                    </div>
                    <!-- ALL CATEGORIES START -->
                     <div class="faq">
                        <div class="faqHeader">
                         <h3>All Categories<button><i class="bi bi-chevron-down"></i> </button></h3>
                        </div>
                        <div class="faqBody">
                          <div class="faqCnt">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Fresh Fruit (25) <span> (134)</span>
                                </label>
                              </div>
                
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Vegetables <span>(150)</span>
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Cooking <span>(54)</span>
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                                <label class="form-check-label" for="flexRadioDefault4">
                                    Snacks <span> (47)</span>
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5">
                                <label class="form-check-label" for="flexRadioDefault5">
                                    Beverages <span>(43)</span>
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6">
                                <label class="form-check-label" for="flexRadioDefault6">
                                    Beauty & Health <span>(38)</span>
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault7">
                                <label class="form-check-label" for="flexRadioDefault7">
                                    Bread & Bakery <span>(15)</span>
                                </label>
                              </div>
                
                          </div>
                        </div>
                        </div>
                        <!-- faq end -->
                     <!-- ALL CATEGORIES END -->
                     <hr>
                      <!-- PRICE RANGE START-->
                      <div class="faq">
                      <div class="faqHeader">
                        <h3>Price<button><i class="bi bi-chevron-down"></i> </button></h3>
                       </div>
                       <div class="faqBody">
                         <div class="faqCnt">
                            <div class="d-flex">
                                <div class="wrapper">
                
                                  <div class="slider">
                                    <div class="progress"></div>
                                  </div>
                                  <div class="range-input">
                                    <input type="range" class="range-min" min="0" max="50000" value="20000" step="100">
                                    <input type="range" class="range-max" min="0" max="50000" value="30000" step="100">
                                  </div>
                                  <div class="price-input">
                                    <div class="field">
                                        <h3>Price:</h3>
                                      <span></span>
                                      <input type="number" class="input-min" value="20000">
                                    </div>
                                    <div class="separator">-</div>
                                    <div class="field">
                                      <span></span>
                                      <input type="number" class="input-max" value="30000">
                                    </div>
                                  </div>
                                </div>
                        </div>
                    </div>
                    </div>
                </div>
                       <!-- PRICE RANGE END  -->
                        <hr>
                        <!-- RATING START -->
                        <div class="faq rating">
                            <div class="faqHeader">
                              <h3>Rating<button><i class="bi bi-chevron-down"></i> </button></h3>
                             </div>
                             <div class="faqBody">
                               <div class="faqCnt">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        <span class="groupStar">
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            5.0
                                        </span>
                                    </label>
                                  </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        <span class="groupStar">
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                            4.0 $ up
                                        </span>
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        <span class="groupStar">
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                            3.0 $ up
                                        </span>
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        <span class="groupStar">
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd "></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd "></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                            2.0 $ up
                                        </span>
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        <span class="groupStar">
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd "></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd "></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd "></i>
                                            <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                            1.0 $ up
                                        </span>
                                    </label>
                                  </div>
                                </div>
                          </div>
                          </div>
                          <!-- </div> -->
                          <!-- </div>                       -->
                         <!-- RATING END -->
                         <hr>
                        <!-- POPULAR TAG START-->
                        <div class="faq tag">
                            <div class="faqHeader">
                              <h3>Popular Tag<button><i class="bi bi-chevron-down"></i> </button></h3>
                             </div>
                             <div class="faqBody">
                               <div class="faqCnt">
                                 <ul class="d-flex flex-wrap">
                                    <li><a href="#">Healty</a></li>
                                    <li><a href="#">Low fat</a></li>
                                    <li><a href="#">Vegetarian</a></li>
                                    <li><a href="#">Kid foods</a></li>
                                    <li><a href="#">Vitamins</a></li>
                                    <li><a href="#">Bread</a></li>
                                    <li><a href="#">Meat</a></li>
                                    <li><a href="#">Snaks</a></li>
                                    <li><a href="#">Tiffin</a></li>
                                    <li><a href="#">Lanuch</a></li>
                                    <li><a href="#">Dinner</a></li>
                                    <li><a href="#">Breakfast</a></li>
                                    <li><a href="#">Fruit</a></li>
                                 </ul>
                          </div>
                          </div>
                      </div>
                      <!-- POPULAR TAG END -->
                
                      <!-- SHOP BANNER START-->
                      <div class="shopBanner">
                        <a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/images/shopBannar.png')}}" alt=""></a>
                    </div>
                    <!-- SHOP BANNER END -->
                      <!-- SALE PRODUCT START-->
                       <div class="saleProduct">
                        <h3>Sale Product</h3>
                      <a href="#" class="saleCard">
                          <div class="card">
                            <div class="row g-0">
                              <div class="col-md-4">
                                <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/capsicum.png')}}" alt="">
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">Red Capsicum</h5>
                                  <p class="card-text">$32.00
                                    <del>$20.99</del></p>
                                  <!-- <p class="card-text"><small class="text-body-secondary"></small></p> -->
                                  <span class="groupStar">
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                </span>
                                </div>
                              </div>
                            </div>
                          </div>
                      </a>
                      <a href="#" class="saleCard">
                          <div class="card">
                            <div class="row g-0">
                              <div class="col-md-4">
                                <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/Product Image(1).svg')}}" alt="">
                
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">Tomato</h5>
                                  <p class="card-text">$30.00
                                    <del>$20.99</del></p>
                                  <!-- <p class="card-text"><small class="text-body-secondary"></small></p> -->
                                  <span class="groupStar">
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                </span>
                                </div>
                              </div>
                            </div>
                          </div>
                      </a>
                      <a href="#" class="saleCard">
                          <div class="card">
                            <div class="row g-0">
                              <div class="col-md-4">
                                <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/cucumber.png')}}" alt="">
                
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">Green Chilli</h5>
                                  <p class="card-text">$32.00
                                    <del>$20.99</del></p>
                                  <!-- <p class="card-text"><small class="text-body-secondary"></small></p> -->
                                  <span class="groupStar">
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd orange"></i>
                                    <i class="fa-sharp-duotone fa-solid fa-star fa-star-chekd"></i>
                                </span>
                                </div>
                              </div>
                            </div>
                          </div>
                      </a>
                    </div>
                    <!-- SALE PRODUCT END -->
                </div>
           

            <!-- Right side of the page -->
              <!-- PRODUCTS START -->
              <div class="col-12 col-md-9">
                <div class="row shopProduct">
                    <!-- Product Cards -->
                   <!-- THIRD SECTION STARTS HERE -->
        <section id="third-section">

                <div class="row mixit justify-content-between">
                    <!-- product 1 start -->
                    <div class="productCard col-lg-3 mix category-b" data-order="2">

                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/potato.png')}}" alt="">

                        <div class="product-text d-flex align-items-center justify-content-between">
                            <div class="cnt">
                                <h3>Big Potatos</h3>
                                <h2>$14.99  <!--<span>$20.99</span>--></h2> 
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
                            <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}" alt=""></span>
                            </div>

                        </div>
                    </div>
                      <!-- products 1 end -->

                       <!-- product 2 start -->
                       <div class="productCard col-lg-3 mix category-b" data-order="2">
                        <!-- <span class="product-img"> -->
                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/cabbage.png')}}" alt="">
                        <!-- </span> -->
                        <div class="product-text d-flex align-items-center justify-content-between">
                            <div class="cnt">
                                <h3>Chanise Cabbage</h3>
                                <h2>$14.99 </h2>
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
                            <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}" alt=""></span>
                            </div>

                        </div>
                    </div>
                        <!-- product 2  end -->

                         <!-- product 3 start -->
                         <div class="productCard col-lg-3 mix category-b category-c" data-order="3">
                            <!-- <span class="product-img"> -->
                            <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/corn.png')}}" alt="">
                            <!-- </span> -->
                            <div class="product-text d-flex align-items-center justify-content-between">
                                <div class="cnt">
                                    <h3>Corn</h3>
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
                                            <p class="text-center out">Out of Stock</p>
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
                          <!-- product 3  end -->

                    <!-- product 4 start -->
                    <div class="productCard col-lg-3 mix category-b category-c" data-order="3">

                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/Image(1).svg')}}" alt="">

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
                            <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}" alt=""></span>
                            </div>

                        </div>
                    </div>
                    <!-- products 4 end -->

                    <!-- products 5 start -->
                    <div class="productCard col-lg-3 mix category-b" data-order="2">
                        <!-- <span class="product-img"> -->
                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/Image.svg')}}" alt="">
                        <!-- </span> -->
                        <div class="product-text d-flex align-items-center justify-content-between">
                            <div class="cnt">
                                <h3>Surjapur Mango</h3>
                                <h2>$14.99 </h2>
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
                            <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}" alt=""></span>
                            </div>

                        </div>
                    </div>
                    <!-- produts 5 end -->


                    <!-- products 6 start -->
                    <div class="productCard col-lg-3 mix category-b" data-order="2">

                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/Product Image.svg')}}" alt="">

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
                            <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}" alt=""></span>
                            </div>

                        </div>
                    </div>                   
                    <!-- products 6 end -->


                    <!-- products 7 start -->
                    <div class="productCard col-lg-3 mix category-a" data-order="1">

                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/Product Image(2).svg')}}" alt="">

                        <div class="product-text d-flex align-items-center justify-content-between">
                            <div class="cnt">
                                <h3>Fresh Cauliflower</h3>
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
                            <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}" alt=""></span>
                            </div>

                        </div>
                    </div>
                    <!-- products 7 end -->

                    <!-- product 8 start -->
                    <div class="productCard col-lg-3 mix category-a" data-order="1">

                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/Product Image(3).svg')}}" alt="">

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
                            <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}" alt=""></span>
                            </div>

                        </div>
                    </div>
                    <!-- product 8 end -->

                    <!-- product 9 start -->
                    <div class="productCard col-lg-3 mix category-b category-c" data-order="3">
                        <!-- <span class="product-img"> -->
                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/Product Image(1).svg')}}" alt="">
                        <!-- </span> -->
                        <div class="product-text d-flex align-items-center justify-content-between">
                            <div class="cnt">
                                <h3>Red Tomatos</h3>
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
                            <div class="bag newBag"><span class=""><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}"
                                        alt=""></span></div>

                        </div>
                    </div>
                    <!-- product 9 end -->

                    <!-- product 10 start -->
                    <div class="productCard col-lg-3">

                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/Image(2).svg')}}" alt="">

                        <div class="product-text d-flex align-items-center justify-content-between">
                            <div class="cnt">
                                <h3>Green Chilli</h3>
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
                            <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}" alt=""></span>
                            </div>

                        </div>
                    </div>
                    <!-- product 10 end -->

                    <!-- product 11 start -->
                    <div class="productCard col-lg-3 mix category-a" data-order="1">

                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/Image(3).svg')}}" alt="">

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
                            <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}" alt=""></span>
                            </div>

                        </div>
                    </div>
                    <!-- product 11 end -->

                     <!-- products 12 start -->
                     <div class="productCard col-lg-3 mix category-b" data-order="2">
                        <!-- <span class="product-img"> -->
                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/Image.svg')}}" alt="">
                        <!-- </span> -->
                        <div class="product-text d-flex align-items-center justify-content-between">
                            <div class="cnt">
                                <h3>Surjapur Mango</h3>
                                <h2>$14.99 </h2>
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
                            <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}" alt=""></span>
                            </div>

                        </div>
                    </div>
                    <!-- produts 12 end -->

                    <!-- products 13 start -->
                    <div class="productCard col-lg-3 mix category-b" data-order="2">

                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/red chilli.png')}}" alt="">

                        <div class="product-text d-flex align-items-center justify-content-between">
                            <div class="cnt">
                                <h3>Red Chili</h3>
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
                            <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}" alt=""></span>
                            </div>

                        </div>
                    </div>                   
                    <!-- products 13 end -->

                    <!-- product 14 start -->
                    <div class="productCard col-lg-3">

                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/cucumber.png')}}" alt="">

                        <div class="product-text d-flex align-items-center justify-content-between">
                            <div class="cnt">
                                <h3>Green Cucumber</h3>
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
                            <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}" alt=""></span>
                            </div>

                        </div>
                    </div>
                    <!-- product 14 end -->

                    <!-- product 15 start -->
                    <div class="productCard col-lg-3">

                        <img class="img-fluid" src="{{asset('Frontend/assets/images/product img/ladies finger.png')}}" alt="">

                        <div class="product-text d-flex align-items-center justify-content-between">
                            <div class="cnt">
                                <h3>Ladies Finger</h3>
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
                            <div class="bag newBag"><span><img src="{{asset('Frontend/assets/images/product img/Rectangle.svg')}}" alt=""></span>
                            </div>

                        </div>
                    </div>
                    <!-- product 15 end -->

                    <!-- PAGINATION START -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                              <span aria-hidden="true"><i class="fa-solid fa-angle-left"></i></span>
                            </a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">4</a></li>
                          <li class="page-item"><a class="page-link" href="#">5</a></li>
                          <li class="page-item"><a class="page-link" href="#">...</a></li>
                          <li class="page-item"><a class="page-link" href="#">21</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                              <span aria-hidden="true"><i class="fa-solid fa-angle-right"></i></span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                     <!-- PAGINATION END -->

                
            </div>
        </section>
        <!-- THIRD SECTION ENDS HERE -->
                </div>
               </div>
               <!-- PRODUCTS END -->
</section>
<!-- SHOP FILTER END HERE -->
<!-- *MAIN CONTENT ENDS HERE -->

<Script>
let faqs = document.querySelectorAll(".faq");
function toggleFAQ(event){
for (faq of faqs){
   faq.classList.remove('active');
}
event.currentTarget.classList.toggle("active");
}
for (faq of faqs){
faq.addEventListener('click',toggleFAQ);
}

// PRICE RANGE START
const rangeInput = document.querySelectorAll(".range-input input"),
  priceInput = document.querySelectorAll(".price-input input"),
  range = document.querySelector(".slider .progress");
let priceGap = 1000;

priceInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minPrice = parseInt(priceInput[0].value),
      maxPrice = parseInt(priceInput[1].value);

    if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
      if (e.target.className === "input-min") {
        rangeInput[0].value = minPrice;
        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
      } else {
        rangeInput[1].value = maxPrice;
        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
      }
    }
  });
});

rangeInput.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minVal = parseInt(rangeInput[0].value),
      maxVal = parseInt(rangeInput[1].value);

    if (maxVal - minVal < priceGap) {
      if (e.target.className === "range-min") {
        rangeInput[0].value = maxVal - priceGap;
      } else {
        rangeInput[1].value = minVal + priceGap;
      }
    } else {
      priceInput[0].value = minVal;
      priceInput[1].value = maxVal;
      range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
      range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
    }
  });
});

// PRICE RANGE END
// FILTER START
const toggleButton = document.getElementById("toggleButton");
const leftContent = document.getElementById("leftContent");
const leftHeader = document.getElementById("leftHeader");
leftHeader.addEventListener("click", () => {
    leftContent.classList.remove("show");
});
toggleButton.addEventListener("click", () => {
    leftContent.classList.toggle("show");
});
</Script>
@endsection