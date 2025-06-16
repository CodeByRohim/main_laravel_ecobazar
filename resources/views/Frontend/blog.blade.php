@extends('layouts.FrontendLayout')
@section('blog')
@section('title','Blog')
  <!-- Breadcrumbs Start Here -->
      <section id="Breadcrumbs">
        <div class="container">
           <ul>
              <li class="d-flex align-items-center">
                 <a href="index.html" class="homeIcom">
                    <iconify-icon icon="fluent:home-16-regular" width="20" height="22"></iconify-icon>
                 </a>
                 <iconify-icon icon="formkit:right" width="15" height="15" style="color: #999"></iconify-icon>
              </li>
              <li class="d-flex align-items-center">
                 <a href="#" class="activ">Blog</a>
              </li>
           </ul>
        </div>
     </section>
     <!-- Breadcrumbs End Hear --> 
    <!-- *BLOG START HERE -->
    <section id="blog">
        <div class="container">
          <!-- SHOP FILTER START HERE -->
<section id="shopFilter">
    <div class="container">
        <div class="row filterRow">
            <!-- Filter Button -->
            <div id="toggleButton" class="filter col-lg-4 col-2">
                <button class="filterBtn">
                    Filter 
                    <iconify-icon class="iconify-icon" icon="rivet-icons:filter"></iconify-icon>
                </button>
            </div>
            
            <!-- Sort Dropdown -->
            <div class="sortDropdown col-lg-6 col-10 text-center d-flex justify-content-end justify-content-lg-start">
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
            
                <div id="leftContent"  class="left-content col col-md-4 filterLeftSideCategories d-lg-block">
                    <div id="leftHeader" class="left-header d-lg-none d-flex justify-content-between align-items-center">                       
                         <a href="./index.html"><img class="img-fluid" src="./images/Logo.svg" alt=""></a>
                        <span id="closeFilter" class="closeFilter"><i class="fa-solid fa-xmark"></i></span>
                    </div>
                    <!-- SEARCH BAR -->
                   <div class="blog-search">
                   <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search...">
                  </div>
                    <!-- ALL CATEGORIES START -->
                    <div class="faq">
                        <div class="faqHeader">
                         <h3>Top Categories</h3>
                        </div>
                        <div class="faqBody">
                          <div class="faqCnt">
                            <div class="form-check">
                                <a href="#">Fresh Fruit</a>
                                <p>(134)</p>
                              </div>
                
                              <div class="form-check">                                
                                <a href="#">Fresh Vegetables</a>
                                  <p>(150)</p>                                
                              </div>
                              <div class="form-check">                             
                                    <a href="#">Cooking</a> 
                                    <p>(54)</p>                               
                              </div>
                              <div class="form-check">                              
                                    <a href="#">Snacks</a>  
                                    <p>(47)</p>                              
                              </div>
                              <div class="form-check">                                
                                    <a href="#">Beverages</a>
                                    <p>(43)</p>                             
                              </div>
                              <div class="form-check justify-content-between">                                                          
                                    <a href="#">Beauty & Health</a> 
                                    <p>(38)</p>                              
                              </div>
                              <div class="form-check">                              
                                    <a href="#">Bread & Bakery</a> 
                                    <p>(15)</p>                              
                              </div>
                
                          </div>
                        </div>
                        </div>
                        <!-- faq end -->
                     <!-- ALL CATEGORIES END -->
                     <hr>
                                       
                        <!-- POPULAR TAG START-->
            <div class="faq tag">
                            <div class="faqHeader">
                              <h3>Popular Tag</h3>
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
                <hr>
                      <!-- SHOP BANNER START-->
                      <div class="shopBanner">
                        <h3>Our Gallery</h3>
                        <a href="#"><img class="img-fluid" src="./images/shopBannar.png" alt=""></a>
                        <a href="#"><img class="img-fluid" src="./images/shopBannar.png" alt=""></a>
                        <a href="#"><img class="img-fluid" src="./images/shopBannar.png" alt=""></a>
                        <a href="#"><img class="img-fluid" src="./images/shopBannar.png" alt=""></a>
                        <a href="#"><img class="img-fluid" src="./images/shopBannar.png" alt=""></a>
                        <a href="#"><img class="img-fluid" src="./images/shopBannar.png" alt=""></a>
                        <a href="#"><img class="img-fluid" src="./images/shopBannar.png" alt=""></a>
                        <a href="#"><img class="img-fluid" src="./images/shopBannar.png" alt=""></a>
                    </div>
                    <!-- SHOP BANNER END -->
                      <!-- SALE PRODUCT START-->
                       <div class="saleProduct">
                        <h3>Recently Added</h3>
                      <a href="#" class="saleCard">
                          <div class="card">
                            <div class="row g-0">
                              <div class="col-md-4 m-auto">
                                <img class="img-fluid" src="./images/product img/capsicum.png" alt="">
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">Curabitur porttitor orci eget nequ accumsan.</h5>
                                  <p>Apr 25,2021</p>
                                </div>
                              </div>
                            </div>
                          </div>
                      </a>
                      <a href="#" class="saleCard">
                          <div class="card">
                            <div class="row g-0">
                              <div class="col-md-4 m-auto">
                                <img class="img-fluid" src="./images/product img/Product Image(1).svg" alt="">
                
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">Donec mattis arcu faucibus suscipit viverra.</h5>
                                  <p>Apr 25,2021</p>
                                </div>
                              </div>
                            </div>
                          </div>
                      </a>
                      <a href="#" class="saleCard">
                          <div class="card">
                            <div class="row g-0">
                              <div class="col-md-4 m-auto">
                                <img class="img-fluid" src="./images/product img/cucumber.png" alt="">
                
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">Quisque posuere tempus rutrum. Integer velit ex.</h5>
                                  <p>Apr 25,2021</p>
                                </div>
                              </div>
                            </div>
                          </div>
                      </a>
                    </div>
                    <!-- SALE PRODUCT END -->
                </div>
           

           
                <!-- Right side of the page -->
              <!-- BLOG START -->
              <div class="blogs col-12 col-md-8">
                <div class="row">                  
                    <!---------LATEST NEWS SECTION START --------->
                        <section id="latestNews">
                              <div class="container">
                                 <div class="row justify-content-between">
                                  <!-- 1 -->
                                    <div class="col-lg-6 latestNewsBox">                                  
                                          <div class="childBox">
                                          <div class="veno-parent">
                                            <a class="venobox" data-vbtype="video" href="./video/istockphoto-2123071364-640_adpp_is.mp4"><img class="img-fluid" src="./drink-img/blog (1).png" alt="">
                                            </a>
                                            <i class="fa-solid fa-play"></i>
                                          </div>                                            
                                             <span class="text">
                                                <h3>18</h3>
                                                <p>NOV</p>
                                             </span>
                                          </div>
                                          <div class="childBox-text">
                                             <div class="d-flex justify-content-between">
                                                
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-tag"></i>
                                                      <p>Food</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-regular fa-user"></i>
                                                      <p>By Admin</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-message"></i>
                                                      <p>65 Comments</p>                                                   
                                                    </div>
                                                   </a>
                                             </div>
                                             <h3 class="curabitur">Curabitur porttitor orci eget neque accumsan venenatis.</h3>
                                             <span><a href="#">Read More <span class="rightArrow"><i
                                                            class="bi bi-arrow-right-short"></i></span></a></span>
                                          </div>
                                    </div>
                                    <!-- 2 -->
                                    <div class="col-lg-6 latestNewsBox">                                  
                                          <div class="childBox">
                                          <div class="veno-parent">
                                            <a class="venobox" data-vbtype="video" href="./video/istockphoto-2123071364-640_adpp_is.mp4"><img class="img-fluid" src="./drink-img/blog(2.00).png" alt="">
                                            </a>
                                            <i class="fa-solid fa-play"></i>
                                          </div>                                            
                                             <span class="text">
                                                <h3>18</h3>
                                                <p>NOV</p>
                                             </span>
                                          </div>
                                          <div class="childBox-text">
                                             <div class="d-flex justify-content-between">
                                                
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-tag"></i>
                                                      <p>Food</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-regular fa-user"></i>
                                                      <p>By Admin</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-message"></i>
                                                      <p>65 Comments</p>                                                   
                                                    </div>
                                                   </a>
                                             </div>
                                             <h3 class="curabitur">Curabitur porttitor orci eget neque accumsan venenatis.</h3>
                                             <span><a href="#">Read More <span class="rightArrow"><i
                                                            class="bi bi-arrow-right-short"></i></span></a></span>
                                          </div>
                                    </div>
                                    <!-- 3 -->
                                    <div class="col-lg-6 latestNewsBox">                                  
                                          <div class="childBox">
                                          <div class="veno-parent">
                                            <a class="venobox" data-vbtype="video" href="./video/istockphoto-2123071364-640_adpp_is.mp4"><img class="img-fluid" src="./drink-img/blog (2).png" alt="">
                                            </a>
                                            <i class="fa-solid fa-play"></i>
                                          </div>                                            
                                             <span class="text">
                                                <h3>18</h3>
                                                <p>NOV</p>
                                             </span>
                                          </div>
                                          <div class="childBox-text">
                                             <div class="d-flex justify-content-between">
                                                
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-tag"></i>
                                                      <p>Food</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-regular fa-user"></i>
                                                      <p>By Admin</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-message"></i>
                                                      <p>65 Comments</p>                                                   
                                                    </div>
                                                   </a>
                                             </div>
                                             <h3 class="curabitur">Curabitur porttitor orci eget neque accumsan venenatis.</h3>
                                             <span><a href="#">Read More <span class="rightArrow"><i
                                                            class="bi bi-arrow-right-short"></i></span></a></span>
                                          </div>
                                    </div>
                                    <!-- 4 -->
                                    <div class="col-lg-6 latestNewsBox">                                  
                                          <div class="childBox">
                                          <div class="veno-parent">
                                            <a class="venobox" data-vbtype="video" href="./video/istockphoto-2123071364-640_adpp_is.mp4"><img class="img-fluid" src="./drink-img/blog (3).png" alt="">
                                            </a>
                                            <i class="fa-solid fa-play"></i>
                                          </div>                                            
                                             <span class="text">
                                                <h3>18</h3>
                                                <p>NOV</p>
                                             </span>
                                          </div>
                                          <div class="childBox-text">
                                             <div class="d-flex justify-content-between">
                                                
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-tag"></i>
                                                      <p>Food</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-regular fa-user"></i>
                                                      <p>By Admin</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-message"></i>
                                                      <p>65 Comments</p>                                                   
                                                    </div>
                                                   </a>
                                             </div>
                                             <h3 class="curabitur">Curabitur porttitor orci eget neque accumsan venenatis.</h3>
                                             <span><a href="#">Read More <span class="rightArrow"><i
                                                            class="bi bi-arrow-right-short"></i></span></a></span>
                                          </div>
                                    </div>
                                    <!-- 5 -->    
                                    <div class="col-lg-6 latestNewsBox">                                  
                                          <div class="childBox">
                                          <div class="veno-parent">
                                            <a class="venobox" data-vbtype="video" href="./video/istockphoto-2123071364-640_adpp_is.mp4"><img class="img-fluid" src="./drink-img/blog (4).png" alt="">
                                            </a>
                                            <i class="fa-solid fa-play"></i>
                                          </div>                                            
                                             <span class="text">
                                                <h3>18</h3>
                                                <p>NOV</p>
                                             </span>
                                          </div>
                                          <div class="childBox-text">
                                             <div class="d-flex justify-content-between">
                                                
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-tag"></i>
                                                      <p>Food</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-regular fa-user"></i>
                                                      <p>By Admin</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-message"></i>
                                                      <p>65 Comments</p>                                                   
                                                    </div>
                                                   </a>
                                             </div>
                                             <h3 class="curabitur">Curabitur porttitor orci eget neque accumsan venenatis.</h3>
                                             <span><a href="#">Read More <span class="rightArrow"><i
                                                            class="bi bi-arrow-right-short"></i></span></a></span>
                                          </div>
                                    </div>
                                    <!-- 6 -->
                                    <div class="col-lg-6 latestNewsBox">                                  
                                          <div class="childBox">
                                          <div class="veno-parent">
                                            <a class="venobox" data-vbtype="video" href="./video/istockphoto-2123071364-640_adpp_is.mp4"><img class="img-fluid" src="./drink-img/blog (5).png" alt="">
                                            </a>
                                            <i class="fa-solid fa-play"></i>
                                          </div>                                            
                                             <span class="text">
                                                <h3>18</h3>
                                                <p>NOV</p>
                                             </span>
                                          </div>
                                          <div class="childBox-text">
                                             <div class="d-flex justify-content-between">
                                                
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-tag"></i>
                                                      <p>Food</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-regular fa-user"></i>
                                                      <p>By Admin</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-message"></i>
                                                      <p>65 Comments</p>                                                   
                                                    </div>
                                                   </a>
                                             </div>
                                             <h3 class="curabitur">Curabitur porttitor orci eget neque accumsan venenatis.</h3>
                                             <span><a href="#">Read More <span class="rightArrow"><i
                                                            class="bi bi-arrow-right-short"></i></span></a></span>
                                          </div>
                                    </div>
                                    <!-- 7 -->
                                    <div class="col-lg-6 latestNewsBox">                                  
                                          <div class="childBox">
                                          <div class="veno-parent">
                                            <a class="venobox" data-vbtype="video" href="./video/istockphoto-2123071364-640_adpp_is.mp4"><img class="img-fluid" src="./drink-img/blog (6).png" alt="">
                                            </a>
                                            <i class="fa-solid fa-play"></i>
                                          </div>                                            
                                             <span class="text">
                                                <h3>18</h3>
                                                <p>NOV</p>
                                             </span>
                                          </div>
                                          <div class="childBox-text">
                                             <div class="d-flex justify-content-between">
                                                
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-tag"></i>
                                                      <p>Food</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-regular fa-user"></i>
                                                      <p>By Admin</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-message"></i>
                                                      <p>65 Comments</p>                                                   
                                                    </div>
                                                   </a>
                                             </div>
                                             <h3 class="curabitur">Curabitur porttitor orci eget neque accumsan venenatis.</h3>
                                             <span><a href="#">Read More <span class="rightArrow"><i
                                                            class="bi bi-arrow-right-short"></i></span></a></span>
                                          </div>
                                    </div>
                                    <!-- 8 -->
                                    <div class="col-lg-6 latestNewsBox">                                  
                                          <div class="childBox">
                                          <div class="veno-parent">
                                            <a class="venobox" data-vbtype="video" href="./video/istockphoto-2123071364-640_adpp_is.mp4"><img class="img-fluid" src="./drink-img/blog (7).png" alt="">
                                            </a>
                                            <i class="fa-solid fa-play"></i>
                                          </div>                                            
                                             <span class="text">
                                                <h3>18</h3>
                                                <p>NOV</p>
                                             </span>
                                          </div>
                                          <div class="childBox-text">
                                             <div class="d-flex justify-content-between">
                                                
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-tag"></i>
                                                      <p>Food</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-regular fa-user"></i>
                                                      <p>By Admin</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-message"></i>
                                                      <p>65 Comments</p>                                                   
                                                    </div>
                                                   </a>
                                             </div>
                                             <h3 class="curabitur">Curabitur porttitor orci eget neque accumsan venenatis.</h3>
                                             <span><a href="#">Read More <span class="rightArrow"><i
                                                            class="bi bi-arrow-right-short"></i></span></a></span>
                                          </div>
                                    </div>
                                     <!-- 9 -->
                                     <div class="col-lg-6 latestNewsBox">                                  
                                          <div class="childBox">
                                          <div class="veno-parent">
                                            <a class="venobox" data-vbtype="video" href="./video/istockphoto-2123071364-640_adpp_is.mp4"><img class="img-fluid" src="./drink-img/blog (8).png" alt="">
                                            </a>
                                            <i class="fa-solid fa-play"></i>
                                          </div>                                            
                                             <span class="text">
                                                <h3>18</h3>
                                                <p>NOV</p>
                                             </span>
                                          </div>
                                          <div class="childBox-text">
                                             <div class="d-flex justify-content-between">
                                                
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-tag"></i>
                                                      <p>Food</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-regular fa-user"></i>
                                                      <p>By Admin</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-message"></i>
                                                      <p>65 Comments</p>                                                   
                                                    </div>
                                                   </a>
                                             </div>
                                             <h3 class="curabitur">Curabitur porttitor orci eget neque accumsan venenatis.</h3>
                                             <span><a href="#">Read More <span class="rightArrow"><i
                                                            class="bi bi-arrow-right-short"></i></span></a></span>
                                          </div>
                                    </div>
                                   <!-- 10 -->
                                   <div class="col-lg-6 latestNewsBox">                                  
                                          <div class="childBox">
                                          <div class="veno-parent">
                                            <a class="venobox" data-vbtype="video" href="./video/istockphoto-2123071364-640_adpp_is.mp4"><img class="img-fluid" src="./drink-img/blog (9).png" alt="">
                                            </a>
                                            <i class="fa-solid fa-play"></i>
                                          </div>                                            
                                             <span class="text">
                                                <h3>18</h3>
                                                <p>NOV</p>
                                             </span>
                                          </div>
                                          <div class="childBox-text">
                                             <div class="d-flex justify-content-between">
                                                
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-tag"></i>
                                                      <p>Food</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-regular fa-user"></i>
                                                      <p>By Admin</p>                                                   
                                                    </div>
                                                   </a>
                                                   <a href="#">
                                                    <div class="blog-link">
                                                      <i class="fa-solid fa-message"></i>
                                                      <p>65 Comments</p>                                                   
                                                    </div>
                                                   </a>
                                             </div>
                                             <h3 class="curabitur">Curabitur porttitor orci eget neque accumsan venenatis.</h3>
                                             <span><a href="#">Read More <span class="rightArrow"><i
                                                            class="bi bi-arrow-right-short"></i></span></a></span>
                                          </div>
                                    </div>
                                    
                                 </div>
                              </div>
                        </section>
       <!---------  LATEST NEWS SECTION END --------->
                </div>
               </div>
               <!-- PRODUCTS END -->
</section>
<!-- SHOP FILTER END HERE -->
        </div>
       </section>
      <!-- *BLOG END HERE -->
  
@endsection