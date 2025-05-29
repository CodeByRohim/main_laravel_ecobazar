<!-- <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>EcoBazar</title>
   <link rel="shortcut icon" href="./assets/img/fav.png" type="image/x-icon">
   <link rel="stylesheet" href="./css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="./css/bootstrap.min.css">
   <link rel="stylesheet" href="./css/slick.css">
   <link rel="stylesheet" href="./css/venobox.min.css">
   <link rel="stylesheet" href="./css/styles.css"> 
   <link rel="stylesheet" href="./css/contact.css">
   <link rel="stylesheet" href="./css/productDetails.css">
   <link rel="stylesheet" href="./css/shopping cart.css">
   <link rel="stylesheet" href="./css/wishlist.css">
   <link rel="stylesheet" href="./css/responsive.css"> 
   <link rel="stylesheet" href="./css/newsletter and footer.css">
</head>

<body> -->
   <?php include 'header.php';?>
    <!-- *Main PART START HERE -->
     <main>
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
                 <a href="./wishlist.html" class="activ">Wishlist</a>
              </li>
           </ul>
        </div>
     </section>
     <!-- Breadcrumbs End Hear --> 
  <!-- *WISHLIST START HERE -->
   <section id="wishlist">
    <!-- Shopping Cart Start Here -->
 <section id="ShoppingCart">
    <div class="container">
      <h2>My Wishlist</h2>
      <div class="row justify-content-between">
        <div class="col-12">
         <div class="heading">
          <ul class="cartList">
            <div class="col-lg-5">
              <li class="">
                <h4>PRODUCT</h4>
                </li>
            </div>
            <div class="col-lg-2">
              <li class="">
                <h4>PRICE</h4>
              </li>
            </div>
            <div class="col-lg-2">
              <li class="">
                <h4>Stock Status</h4>
              </li>
            </div>
            <div class="col-lg-2">
              <li class="">
                <h4></h4>
              </li>
            </div>
            <div class="col-lg-1 d-none d-lg-block">
              <li class="">
                <h4></h4>
              </li>
            </div>
          </ul>
         </div>
         <!-- product 1 -->
          <div class="cartItem">
            <div class="cartItemWrapper d-flex align-items-center justify-content-betwee">
              <div class="col-lg-5 cartItemImg d-flex align-items-center">
                <img class="img-fluid" src="./images/product img/Image(1).svg" alt="">
                <div class="cartItemText">
                  <h4>Green Capsicum</h4>
                </div>
              </div>
              
              <div class="col-lg-2 cartItemPrice">
                <h4>$14.00 <del>$20.99</del></h4>
              </div>
              <div class="col-lg-2 cartItemQuantity">
                <div class="quantity">
                  <!-- <button>-</button>
                  <input type="text" value="1">
                  <button>+</button> -->
                  <p>In Stock</p>
                </div>
              </div>
              
              <div class="col-lg-2 cartItemTotal">
                <a class="d-none d-lg-inline" href="#">Add to Cart</a>
                <a class="d-lg-none" href="#"><span class="iconify-icon">
                    <img class="img-fluid" src="./images/Rectangle.svg" alt=""></span></a>
              </div>
              <div class="col-lg-1 cartItemAction text-end">
                <a href="#"><i class="fa-solid fa-xmark"></i></a>
              </div>
            </div>
        </div>
        <!-- product 2 -->
        <div class="cartItem">
            <div class="cartItemWrapper d-flex align-items-center justify-content-betwee">
              <div class="col-lg-5 cartItemImg d-flex align-items-center">
                <img class="img-fluid" src="./images/product img/cabbage.png" alt="">
                <div class="cartItemText">
                  <h4>Chinese Cabbage</h4>
                </div>
              </div>
              
              <div class="col-lg-2 cartItemPrice">
                <h4>$45.00 <del></del></h4>
              </div>
              <div class="col-lg-2 cartItemQuantity">
                <div class="quantity">
                  <p>In Stock</p>
                </div>
              </div>
              <div class="col-lg-2 cartItemTotal">
                <a class="d-none d-lg-inline" href="#">Add to Cart</a>
                <a class="d-lg-none" href="#"><span class="iconify-icon">
                    <img class="img-fluid" src="./images/Rectangle.svg" alt=""></span></a>
              </div>
              <div class="col-lg-1 cartItemAction text-end">
                <a href="#"><i class="fa-solid fa-xmark"></i></a>
              </div>
            </div>
        </div>
     <!-- product 3 -->
     <div class="cartItem">
        <div class="cartItemWrapper d-flex align-items-center justify-content-betwee">
          <div class="col-lg-5 cartItemImg d-flex align-items-center">
            <img class="img-fluid" src="./images/product img/Image.svg" alt="">
            <div class="cartItemText">
              <h4>Fresh Sujapuri Mango</h4>
            </div>
          </div>
          
          <div class="col-lg-2 cartItemPrice">
            <h4>$9.00 <del></del></h4>
          </div>
          <div class="col-lg-2 cartItemQuantity">
            <div class="quantity out">
              <p>Out Of Stock</p>
            </div>
          </div>
          <div class="col-lg-2 cartItemTotal">
            <a class="out d-none d-lg-inline" href="#">Add to Cart</a>
          </div>
          <div class="col-lg-1 cartItemAction text-end">
            <a href="#"><i class="fa-solid fa-xmark"></i></a>
          </div>
        </div>
    </div>
  <!-- product return and update -->
  <div class="cartItem ReturnUpdate">
    <div class="cartItemWrapper d-flex align-items-center justify-content-betwee">
        <div class="social-payment">
            <p>Share:</p>
            <div class="social">
                <a href="#"><img class="img-fluid" src="./drink-img/facebook 1.svg" alt=""></a>
                <a href="#"><img class="img-fluid" src="./drink-img/twitter 1.svg" alt=""></a>
                <a href="#"><img class="img-fluid" src="./drink-img/pinterest 1.svg" alt=""></a>
                <a href="#"><img class="img-fluid" src="./drink-img/instagram 1.svg" alt=""></a>
            </div>            
        </div>
    </div>
  </div>
  <!-- coupon code -->
 
    </div>
    </div>
</section>
<!-- Shopping Cart End Here -->
   </section>
  <!-- *WISHLIST END HERE -->

  
  <!-- *MAIN CONTENT ENDS HERE -->
  <?php include 'footer.php';?>
</main>
<script>
     $(document).ready(function() {
      $('.venobox').venobox(); 
    });
  </script>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jquery-3.7.1.min.js"></script>
<script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
<script src="./js/slick.min.js"></script>
 <script src="./js/mixitup.min.js"></script>
<script src="./js/venobox.min.js"></script> 
<script src="./js/app.js"></script>
<!-- <script src="./js/header and footer.js"></script> -->
</body>
</html>