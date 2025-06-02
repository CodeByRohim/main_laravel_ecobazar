 @extends('layouts.FrontendLayout')
@section('title', 'Single Product')
@section('single_product')
 <!-- Menu Section -->
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
                 <a href="{{route('frontend.singleProducts')}}" class="activ">{{$product->category->slug ? Str::ucfirst($product->category->slug) : 'Single Product'}}</a>
              </li>
           </ul>
        </div>
     </section>
     <!-- Breadcrumbs End Hear -->

     <!-- Details Products Start Here -->
      <section id="productDetails">
        <div class="container">
          <div class="row">
            <!-- Left Side -->
                 <div class="slider-wrap d-flex justify-content-between col-12 col-lg-6" >

                <div class="nav-cnt col-lg-3">
                    <button class="up prevArrow"><i class="fa-solid fa-angle-up"></i></button>
                    <div class="slider-nav">
                        
                      <div class="product2">
                       <img class="img-fluid" src="{{getImage($product->featured_image)}}" alt="{{$product->title}}" alt="{{$product->title}}">
                      </div>
                      @foreach($galleryImages as $gallery)
                      <div class="product2">
                        <img class="img-fluid " src="{{getImage($gallery)}}" alt="{{$product->title}}">
                      </div>
                      @endforeach
                     
                    </div>
                    <button class="down nextArrow"><i class="fa-solid fa-angle-down"></i></button>
                </div>
                <div class="for-cnt col-lg-9">
                    <div class="slider-for">
                      <div class="product1">
                        <img class="img-fluid" src="{{getImage($product->featured_image)}}" alt="{{$product->title}}">
                      </div>
                      @foreach($galleryImages as $gallery)
                      <div class="product1">
                        <img class="img-fluid " src="{{getImage($gallery)}}" alt="{{$product->title}}">
                      </div>
                      @endforeach
                     
                    </div>
                </div>
              </div>           
            <!-- Right Side -->
            <div class="stock col-12 col-lg-6">
              <h2 class="d-flex align-items-center">{{$product->title}}<span>{{$product->qty == true ? 'In Stock' : 'Out of Stock'}}</span></h2>
              <span class="groupStar">
                <i class="fa fa-star fa-star-checked orange"></i>
                <i class="fa fa-star fa-star-checked orange"></i>
                <i class="fa fa-star fa-star-checked orange"></i>
                <i class="fa fa-star fa-star-checked orange"></i>
                <i class="fa fa-star fa-star-checked "></i>
                <p> 4 Reviews </p>
                <span class="dot d-flex align-items-center">.</span>
                <h6 class="">SKU: <span>{{$product->sku}}</span></h6>
              </span>
              <div class="price">
                  @if($product->selling_price)
                   @php
                   $discount = ceil(100 - (100 / $product->price) * $product->selling_price);
                    @endphp
               
                  <h3>${{$product->price}}</h3>
                  <span class="green"> ${{$product->selling_price}} Tk.</span>
                  <span class="off">{{  $discount }} % Off</span>
                  @else
                  <h3>${{$product->price}} Tk.</h3>
                  
                  @endif
              </div>
              <hr>
              <!-- brand name and social link  -->
              <div class="brand-social">
                
                  <div class="brand">
                    @if($product->brand->icon)
                    <h4 class="">Brand: <img class="img-fluid" src="{{ asset('storage/' . $product->brand->icon)}}" alt=""> </h4>
                    @else
                     <h4 class="">Brand: <span>{{ Str::ucfirst($product->brand->title) }}</span></h4>
                     @endif
                  </div>
                    <div class="social-link">
                        <h4>Share item:</h4>
                    <div class="social">
                        
                        <a href="#"><img class="img-fluid active" src="{{asset('Frontend/assets/drink-img/facebook 1.svg')}}" alt="dd"></a>
                        <a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/twitter 1.svg')}}" alt=""></a>
                        <a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/pinterest 1.svg')}}" alt=""></a>
                        <a href="#"><img class="img-fluid" src="{{asset('Frontend/assets/drink-img/instagram 1.svg')}}" alt=""></a>
                    </div>
                              {{-- </h4> --}}
                              </div>
              </div>
              <!-- text -->
              <p class="text-details">{!! $product->short_detail !!} </p>

              <hr>
              <!-- quantity -->
              <div class="cartItemQuantity">
                <div class="quantity">
                  <button>-</button>
                  <input type="text" value="1">
                  <button>+</button>
                </div>
                <div class="cartAddBtn">
                    <button>Add to Cart 
                        <!-- <div class="cartIcon"> -->
                        <span class="iconify-icon">
                            <img width="34" height="26" src="{{asset('Frontend/assets/images/Rectangle.svg')}}" alt="">                            
                            <span>
                    <!-- </div> -->
                </button>
                </div>
                <a class="heart" href="#">
                    <span class="iconify-icon">
                        <img width="20" height="22" src="{{asset('Frontend/assets/images/circum--heart.svg')}}" alt="">
                    </span>
                    </span>
                </a>
              </div>
              <hr>
              <!-- category -->
               <span class="category">Category: <span>{{ Str::ucfirst($product->category->slug) }}</span></span>
               <!-- tag -->
                <p class="tag">Tag: <span>Vegetables Healthy <a href="#">Chinese</a>{{$product->title}}</span></p>
          </div>
        <!-- *END OF VEGETABLE PART -->
         
          <!-- Description and Additional info part start-->
          
              <div id="navAndTab" class="description">
                  <nav class="col-12">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Descriptions</button>
                      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Additional Information</button>
                      <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Customer Feedback</button>
                    </div>
                  </nav>   
                 
                  <div class="tab-content" id="nav-tabContent">
                    <!-- description  -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">                       
                        <div class="descript d-flex justify-content-between">
                            <div class="txt col-12 col-lg-6"><p>{!! $product->long_detail !!} </span></p>
                            <span class="d-block checks"><i class="fa-solid fa-check check"></i>100 g of fresh leaves provides.</span>
                            <span class="d-block checks"><i class="fa-solid fa-check check"></i>Aliquam ac est at augue volutpat elementum.</span>
                            <span class="d-block checks"><i class="fa-solid fa-check check"></i>Quisque nec enim eget sapien molestie.</span>
                            <span class="d-block checks"><i class="fa-solid fa-check check"></i>Proin convallis odio volutpat finibus posuere.</span>
                            <p class="mt-1">Cras et diam maximus, accumsan sapien et, sollicitudin velit. Nulla blandit eros non turpis lobortis iaculis at ut massa. </p>
                                                </div>
                                                <div class="veno-parent col-12 col-lg-6">
                            <a class="venobox" data-vbtype="video" href="{{$product->video}}"><img src="{{getImage($product->featured_image)}}" alt="{{$product->title}}"></a>
                                                   <!-- box start-->
                            <div class="d-flex justify-content-end">
                                <div class="box">
                                    <div class="discount d-flex align-items-center justify-content-between flex-wra">
                                        <img class="img-fluid text-start" src="./images/price-tag 1.png" alt="">
                                        <div>
                                            <h5 class="text-start">{{  $discount }}% Discount</h5>
                                            <p class="text-start">Save your {{  $discount }}% money with us</p>
                                        </div>
                                    </div>
                                    <div class="organic d-flex align-items-center justify-content-between flex-wra">
                                        <img class="img-fluid text-start" src="./images/leaf 1.png" alt="">
                                        <div>
                                            <h5 class="text-start">100% Organic</h5>
                                            <p class="text-start">100% Organic Vegetables</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- box end -->
                                                </div>
                        </div>
                    </div>
                <!-- additional -->
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="additional d-flex justify-content-between">
                            <div class="addInfo col-12 col-lg-6">
                               {{-- <p>Weight:<span class="three">03</span></p> --}}
                               <p>Type:<span class="organic">{{$product->category->title}}</span></p>
                               <p>Category:<span class="vege">{{$product->category->title}}</span></p>
                               <p>Stock Status:<span class="avail">Available ({{$product->qty}})</span></p>
                               <p>Tags:<span class="health">Vegetables,  Healthy, Chinese, Cabbage, Green Cabbage.</span></p>
                            </div>
                            <div class="veno-parent col-12 col-lg-6">
                                <a class="venobox" data-vbtype="video" href="./video/istockphoto-2123071364-640_adpp_is.mp4"><img src="{{ getImage($product->featured_image)}}" alt="{{$product->title}}"></a>
                               <!-- box start-->
                                <div class="d-flex justify-content-end">
                                    <div class="box">
                                        <div class="discount d-flex align-items-center justify-content-between flex-wra">
                                            <img class="img-fluid text-start" src="./images/price-tag 1.png" alt="">
                                            <div>
                                                <h5 class="text-start">{{$discount}}% Discount</h5>
                                                <p class="text-start">Save your {{$discount}}% money with us</p>
                                            </div>
                                        </div>
                                        <div class="organic d-flex align-items-center justify-content-between flex-wra">
                                            <img class="img-fluid text-start" src="./images/leaf 1.png" alt="">
                                            <div>
                                                <h5 class="text-start">100% Organic</h5>
                                                <p class="text-start">100% Organic Vegetables</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- box end -->
                            </div>
                        </div>
                       </div>
                       <!-- feedback -->
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contacr-tab">
                        <div class="feedback d-flex justify-content-between">
                            <div class="col-12 col-lg-7">     
                            
                                <!-- Review Card 1-->
                                <div class="review-card">
                                  <div class="review-header">
                                    <div class="d-flex align-items-center">
                                      <img src="./drink-img/profile1.png" alt="Profile Picture">
                                      <div class="review-details">
                                        <h5 class="mb-0">Kristin Watson</h5>
                                        <div class="review-stars">
                                          &#9733;&#9733;&#9733;&#9733;&#9734; <!-- 4/5 stars -->
                                        </div>
                                      </div>
                                    </div>
                                    <div class="review-date">
                                        2 min ago     
                                    </div>
                                  </div>
                                  <div class="review-text">
                                    <p>
                                        Duis at ullamcorper nulla, eu dictum eros.
                                    </p>
                                  </div>
                                </div>
                                 <!-- Review Card 2-->
                                 <div class="review-card">
                                    <div class="review-header">
                                      <div class="d-flex align-items-center">
                                        <img src="./drink-img/Profile2.png" alt="Profile Picture">
                                        <div class="review-details">
                                          <h5 class="mb-0">Jane Cooper</h5>
                                          <div class="review-stars">
                                            &#9733;&#9733;&#9733;&#9733;&#9734; <!-- 4/5 stars -->
                                          </div>
                                        </div>
                                      </div>
                                      <div class="review-date">
                                        30 Apr, 2021
                                      </div>
                                    </div>
                                    <div class="review-text">
                                      <p>
                                        Keep the soil evenly moist for the healthiest growth. If the sun gets too hot, Chinese cabbage tends to "bolt" or go to seed; in long periods of heat, some kind of shade may be helpful. Watch out for snails, as they will harm the plants.
                                      </p>
                                    </div>
                                  </div>
                                   <!-- Review Card 3-->
                                <div class="review-card">
                                    <div class="review-header">
                                      <div class="d-flex align-items-center">
                                        <img src="./drink-img/profile3.png" alt="Profile Picture">
                                        <div class="review-details">
                                          <h5 class="mb-0">Jacob Jones</h5>
                                          <div class="review-stars">
                                            &#9733;&#9733;&#9733;&#9733;&#9734; <!-- 4/5 stars -->
                                          </div>
                                        </div>
                                      </div>
                                      <div class="review-date">
                                        2 min ago     
                                      </div>
                                    </div>
                                    <div class="review-text">
                                      <p>
                                        Vivamus eget euismod magna. Nam sed lacinia nibh, et lacinia lacus.
                                      </p>
                                    </div>
                                  </div>
                                   <!-- Review Card 4-->
                                <div class="review-card">
                                    <div class="review-header">
                                      <div class="d-flex align-items-center">
                                        <img src="./drink-img/profile4.png" alt="Profile Picture">
                                        <div class="review-details">
                                          <h5 class="mb-0">Ralph Edwards</h5>
                                          <div class="review-stars">
                                            &#9733;&#9733;&#9733;&#9733;&#9734; <!-- 4/5 stars -->
                                          </div>
                                        </div>
                                      </div>
                                      <div class="review-date">
                                        2 min ago
                                      </div>
                                    </div>
                                    <div class="review-text">
                                      <p>
                                        200+ Canton Pak Choi Bok Choy Chinese Cabbage Seeds Heirloom Non-GMO Productive Brassica rapa VAR. chinensis, a.k.a. Canton's Choice, Bok Choi, from USA

                                      </p>
                                    </div>
                                  </div>
                                  <button>Learn More</button>
                        </div>
                        <div class="col-lg-5"></div>
                    </div>
                  </div>
              </div>
          
           <!--  Description and Additional info part start -->

              </div>
        </div>  
      </section>
      <!-- Details Products end Here -->
       <!-- Related Products Start Here -->
        <section id="relatedProduct">
            <div class="container">
                <h2>Related Products</h2>
                 <!-- PRODUCTS START -->
              <div class="col-12">
                <div class="row shopProduct">
                   
                   <!-- THIRD SECTION STARTS HERE -->
         <section id="third-section">

                <div class="row mixit justify-content-between">
                  @forelse($relatedProducts as $product)
                {{-- {{  dd($product)}}; --}}
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
        </section>
        <!-- THIRD SECTION ENDS HERE -->
                </div>
               </div>
               <!-- PRODUCTS END -->
            </div>
        </section>
       <!-- Related Products End Here -->
@endsection 