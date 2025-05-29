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
   <link rel="stylesheet" href="./css/checkout.css">
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
                 <a href="./shopping cart.html" class="activ">Shopping Cart</a>
              </li>
              <li class="d-flex align-items-center">
                <iconify-icon icon="formkit:right" width="15" height="15" style="color: #999"></iconify-icon>
                <a href="./checkout.html" class="activ">Checkout</a>
             </li>
           </ul>
        </div>
     </section>
     <!-- Breadcrumbs End Hear -->
<!-- BILLING INFO START HERE -->
 <section id="BillingInfo">
  <div class="container">
    <div class="row bill justify-content-between">
      <!-- left -->
      <div class="col-lg-8 bill">
        <div class="left">
          <h2>Billing Information</h2>
          <form action="">
            <div class="first-last-com-wrap">
              <div class="formGroup">
                <label for="name">Name</label>
                <input type="text" id="name" placeholder="Enter your name">
              </div>
              <div class="formGroup">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Enter your email">
              </div>
              <div class="formGroup">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" placeholder="Enter your phone">
              </div>
            </div>

            <div class="formGroup">
              <label for="address">Street Address</label>
              <input type="text" id="address" placeholder="Enter your address">
            </div>

            <div class="country-status-zip">
              <div class="formGroup">
                <label for="country">Country</label>
                  <!-- <input type="text" id="country" placeholder="country"> -->
                  <select class="form-select form-select-lg mb-3" aria-label="Large select example" id="country">
                    <option selected>Country</option>
                    <option value="1">BD</option>
                    <option value="2">US</option>
                    <option value="3">UK</option>
                  </select>
                
                
              </div>
              <div class="formGroup">
                <label for="city">States</label>
                <!-- <input type="text" id="city" placeholder="Enter your city"> -->
                <select class="form-select form-select-lg mb-3" aria-label="Large select example" id="country">
                  <option selected>Selects</option>
                  <option value="1">Dhaka</option>
                  <option value="2">New York</option>
                  <option value="3">London</option>
                </select>
              </div>

              <div class="formGroup">
                <label for="zip">Zip Code</label>
                <input type="text" id="zip" placeholder="Enter your zip code">
              </div>             
            </div>

            <div class="email-phone">
              <div class="formGroup">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Email Address">
              </div>
              <div class="formGroup">
                <label for="phone">Phone</label>
                <input type="text" id="phone" placeholder="Phone number">
              </div>            
            </div>

            <!-- <div class="formGroup">              
              <input type="checkbox" id="checkbox" placeholder="Enter your address">
              <label for="checkbox">Ship to a different address</label>
            </div> -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Ship to a different address
              </label>
            </div>
            

            <h2>Additional Info</h2>

            <div class="formGroup add">
              <label for="note">Order Notes (Optional)</label>
              <textarea name="note" id="note" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
            </div>
          </form>
        </div>
        </div>
        <!-- right -->
      <div class="col-lg-4">
       <div class="right ">
        <div class="card">
          <div class="card-header">
            Order Summery
          </div>
          <div class="productSum">
            <!-- product 1 -->
            <div class="d-flex align-items-center justify-content-between">
              <div class="productImg">
                <img class="img-fluid" src="./images/product img/Image.svg" 
                alt="">   
                <h4>Green Capsicum x5</h4>             
              </div>
              <div class="productText">                              
                <p>$84.00</p>
              </div>
            </div>
            <!-- product 2 -->
            <div class="d-flex align-items-center justify-content-between">
              <div class="productImg">
                <img class="img-fluid" src="./images/product img/Image.svg" 
                alt="">   
                <h4>Green Capsicum x5</h4>             
              </div>
              <div class="productText">                              
                <p>$84.00</p>
              </div>
            </div>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between br">Subtotal: <span>$84.00</span></li>
            <li class="list-group-item d-flex justify-content-between br">Shipping: <span>Free</span></li>
            <li class="list-group-item d-flex justify-content-between">Total: <span>$84.00</span></li>
          </ul>
          <!--  -->
          <div class="card-header">
            Payment Method
          </div>

          <div class="payment">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
              <label class="form-check-label" for="flexRadioDefault1">
                Cash on Delivery
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
              <label class="form-check-label" for="flexRadioDefault1">
                Paypal
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
              <label class="form-check-label" for="flexRadioDefault1">
                Amazon Pay
              </label>
            </div>
          </div>

          <a class="checkout" href="./checkout.html">
              <!-- <button> -->
               Place Order
            <!-- </button> -->
            </a>
           
            
        </div>
       </div>
         </div>
         </div>
          </div>
 </section>
<!-- BILLING INFO END HERE -->

     <!-- *MAIN CONTENT ENDS HERE -->
  <?php include 'footer.php';?>
</main>
<script>
     $(document).ready(function() {
      $('.venobox').venobox(); // Initialize VenoBox
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