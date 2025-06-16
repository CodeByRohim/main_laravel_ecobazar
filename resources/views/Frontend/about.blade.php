@extends ('layouts.FrontendLayout')
@section ('about')
@section ('title', 'About Us')
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
            <a href="{{route('about')}}" class="activ">About</a>
          </li>
        </ul>
      </div>
    </section>
    <!-- Breadcrumbs End Hear -->
    <!--*ABOUT START HERE -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="first-text order-2 order-lg-1 col-lg-5">
            <div class="aboutText">
              <h2>100% Trusted<span class="d-block"> Organic Food Store</span></h2>
              <p>Morbi porttitor ligula in nunc varius sagittis. Proin dui nisi, laoreet ut tempor ac, cursus vitae
                eros. Cras quis ultricies elit. Proin ac lectus arcu. Maecenas aliquet vel tellus at accumsan. Donec a
                eros non massa vulputate ornare. Vivamus ornare commodo ante, at commodo felis congue vitae.
              </p>
            </div>
          </div>
          <div class="first-img order-1 order-lg-2 col-lg-7">
            <div class="aboutImg">
              <img class="img-fluid" src="{{asset('Frontend/assets/images/aboutStart.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- second -->
    <section id="about2">
      <div class="aboutSecond">
        <div class="container">
          <div class="row">
            <div class="second-img col-lg-6">
              <div class="aboutImg">
                <img class="img-fluid" src="{{asset('Frontend/assets/images/aboutsMiddle.png')}}" alt="">
              </div>
            </div>
            <div class="second-text col-lg-6">
              <div class="aboutText">
                <h2>100% Trusted<span class="d-block"> Organic Food Store</span></h2>
                <p>Pellentesque a ante vulputate leo porttitor luctus sed eget eros. Nulla et rhoncus neque. Duis non
                  diam eget est luctus tincidunt a a mi. Nulla eu eros consequat tortor tincidunt feugiat.
                </p>
                <div class="infoMiddle">
                  <div class="leaf">
                    <img class="img-fluid" src="{{asset('Frontend/assets/images/leafabout.png')}}" alt="">
                    <div>
                      <h5>100% Organic food</h5>
                      <p>100% healthy & Fresh food.</p>
                    </div>
                  </div>
                  <div class="leaf">
                    <img class="img-fluid" src="{{asset('Frontend/assets/images/head.png')}}" alt="">
                    <div>
                      <h5>Great Support 24/7</h5>
                      <p>Instant access to Contact</p>
                    </div>
                  </div>
                  <div class="leaf">
                    <img class="img-fluid" src="{{asset('Frontend/assets/images/star (1).png')}}" alt="">
                    <div>
                      <h5>Customer Feedback</h5>
                      <p>Our happy customer</p>
                    </div>
                  </div>
                  <div class="leaf">
                    <img class="img-fluid" src="{{asset('Frontend/assets/images/rightbag.png')}}" alt="">
                    <div>
                      <h5>100% Sucure Payment</h5>
                      <p>We ensure your money is save</p>
                    </div>
                  </div>
                  <div class="leaf">
                    <img class="img-fluid" src="{{asset('Frontend/assets/images/car.png')}}" alt="">
                    <div>
                      <h5>Free Shipping </h5>
                      <p>Free shipping with discount</p>
                    </div>
                  </div>
                  <div class="leaf">
                    <img class="img-fluid" src="{{asset('Frontend/assets/images/cube.png')}}" alt="">
                    <div>
                      <h5>100% Organic Food</h5>
                      <p>100% healthy & Fresh food.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- third -->
    <section id="about3">
      <div class="container">
        <div class="row">
          <div class="first-text order-2 order-lg-1 col-lg-5">
            <div class="aboutText">
              <h2>We Delivered, You <span class="d-block">Enjoy Your Order.</span></h2>
              <p>Ut suscipit egestas suscipit. Sed posuere pellentesque nunc, ultrices consectetur velit dapibus eu.
                Mauris sollicitudin dignissim diam, ac mattis eros accumsan rhoncus. Curabitur auctor bibendum nunc eget
                elementum.
              </p>
              <span><i class="fa-solid fa-check"></i>Sed in metus pellentesque.</span>
              <span><i class="fa-solid fa-check"></i>Fusce et ex commodo, aliquam nulla efficitur, tempus lorem.</span>
              <span><i class="fa-solid fa-check"></i>Maecenas ut nunc fringilla erat varius.</span>
              <button>Shop Now<i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>
          <div class="first-img order-1 order-lg-2 col-lg-7">
            <div class="aboutImg">
              <img class="img-fluid" src="{{asset('Frontend/assets/images/aboutEnd.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--*ABOUT END HERE -->

    <!-- TEAM START HERE -->
    <section id="team">
      <div class="container">
        <div class="row">
          <div class="teamWrapper col-lg-12 text-center">
            <h2>Our Awesome Team</h2>
            <p>Pellentesque a ante vulputate leo porttitor luctus sed eget eros. Nulla et <span class="d-block">rhoncus
                neque. Duis non diam eget est luctus tincidunt a a mi.</span></p>
            <div class="member cardMslider">
              <!-- 1 -->
              <div class="member-card">
                <img class="img-fluid" src="{{asset('Frontend/assets/drink-img/team1.png')}}" alt="">
                <div class="name">
                  <h5>Jenny Wilson</h5>
                  <h6>Ceo & Founder</h6>
                </div>
                <div class="overlay">
                  <span><a href="#"><i class="fa-brands fa-facebook"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-twitter"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-instagram"></i></a></span>
                </div>
              </div>
              <!-- 2 -->
              <div class="member-card">
                <img class="img-fluid" src="{{asset('Frontend/assets/drink-img/team2.png')}}" alt="">
                <div class="name">
                  <h5>Jane Cooper</h5>
                  <h6>Worker</h6>
                </div>
                <div class="overlay">
                  <span><a href="#"><i class="fa-brands fa-facebook"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-twitter"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-instagram"></i></a></span>
                </div>
              </div>
              <!-- 3 -->
              <div class="member-card">
                <img class="img-fluid" src="{{asset('Frontend/assets/drink-img/team3.png')}}" alt="">
                <div class="name">
                  <h5>Cody Fisher</h5>
                  <h6>Security Guard</h6>
                </div>
                <div class="overlay">
                  <span><a href="#"><i class="fa-brands fa-facebook"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-twitter"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-instagram"></i></a></span>
                </div>
              </div>
              <!-- 4 -->
              <div class="member-card">
                <img class="img-fluid" src="{{asset('Frontend/assets/drink-img/team4.png')}}" alt="">
                <div class="name">
                  <h5>Robert Fox</h5>
                  <h6>Senior Farmer Manager</h6>
                </div>
                <div class="overlay">
                  <span><a href="#"><i class="fa-brands fa-facebook"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-twitter"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-instagram"></i></a></span>
                </div>
              </div>
              <!-- 4 -->
              <div class="member-card">
                <img class="img-fluid" src="{{asset('Frontend/assets/drink-img/team4.png')}}" alt="">
                <div class="name">
                  <h5>Robert Fox</h5>
                  <h6>Senior Farmer Manager</h6>
                </div>
                <div class="overlay">
                  <span><a href="#"><i class="fa-brands fa-facebook"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-twitter"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></span>
                  <span><a href="#"><i class="fa-brands fa-instagram"></i></a></span>
                </div>
              </div>
            </div>
            <button id="teamLeftBtn"><i class="fa-solid fa-arrow-left"></i></button>
            <button id="teamRightBtn"><i class="fa-solid fa-arrow-right"></i></button>
          </div>
        </div>
      </div>
    </section>
    <!-- TEAM END HERE -->
    <!-- TESTIMONIAL START HERE-->
    <section id="testimonial">
      <div class="container">
        <div class="row">
          <div class="testimonialWrapper col-lg-12 text-center">
            <div class="d-flex align-items-center justify-content-between">
              <h2>Client Testimonial</h2>
              <div>
                <button id="testRightBtn"><i class="fa-solid fa-arrow-left"></i></button>
                <button id="testLeftBtn"><i class="fa-solid fa-arrow-right"></i></button>
              </div>
            </div>
            <div class="testCardParent testMslider">

              <div class="testCard">
                <img class="img-fluid coma" src="{{asset('Frontend/assets/images/Vector.svg')}}" alt="">
                <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu magna
                  dictum, bibendum cursus velit sodales. Donec sed neque eget</p>
                <div class="profile-name">
                  <div class="pr d-flex align-items-center gap-2">
                    <img class="img-fluid" src="{{asset('Frontend/assets/drink-img/test (3).png')}}" alt="">
                    <div class="text-start">
                      <h5>Robert Fox</h5>
                      <h6 class="text-start">Customer</h6>
                    </div>
                  </div>
                  <div class="star">
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                  </div>
                </div>
              </div>

              <div class="testCard">
                <img class="img-fluid coma" src="{{asset('Frontend/assets/images/Vector.svg')}}" alt="">
                <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu magna
                  dictum, bibendum cursus velit sodales. Donec sed neque eget</p>
                <div class="profile-name">
                  <div class="pr d-flex align-items-center gap-2">
                    <img class="img-fluid" src="{{asset('Frontend/assets/drink-img/test (2).png')}}" alt="">
                    <div class="text-start">
                      <h5>Dianne Russell</h5>
                      <h6 class="text-start">Customer</h6>
                    </div>
                  </div>
                  <div class="star">
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                  </div>
                </div>
              </div>

              <div class="testCard">
                <img class="img-fluid coma" src="{{asset('Frontend/assets/images/Vector.svg')}}" alt="">
                <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu magna
                  dictum, bibendum cursus velit sodales. Donec sed neque eget</p>
                <div class="profile-name">
                  <div class="pr d-flex align-items-center gap-2">
                    <img class="img-fluid" src="{{asset('Frontend/assets/drink-img/test (1).png')}}" alt="">
                    <div class="text-start">
                      <h5>Eleanor Pena</h5>
                      <h6 class="text-start">Customer</h6>
                    </div>
                  </div>
                  <div class="star">
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                  </div>
                </div>
              </div>

              <div class="testCard">
                <img class="img-fluid coma" src="{{asset('Frontend/assets/images/Vector.svg')}}" alt="">
                <p>Pellentesque eu nibh eget mauris congue mattis mattis nec tellus. Phasellus imperdiet elit eu magna
                  dictum, bibendum cursus velit sodales. Donec sed neque eget</p>
                <div class="profile-name">
                  <div class="pr d-flex align-items-center gap-2">
                    <img class="img-fluid" src="{{asset('Frontend/assets/drink-img/test (1).png')}}" alt="">
                    <div class="text-start">
                      <h5>Eleanor Pena</h5>
                      <h6 class="text-start">Customer</h6>
                    </div>
                  </div>
                  <div class="star">
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                    <i class="fa-solid fa-star orange"></i>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- TESTIMONIAL END HERE -->
    <!-- LOGO START HERE-->
    <section id="aboutLogo">
      <div class="container">
        <div class="row">
          <div class="logos">
            <span class="col-6 col-lg-1"><img class="img-fluid" src="{{asset('Frontend/assets/images/steps.svg')}}" alt=""></span>
            <span class="col-6 col-lg-1"><img class="img-fluid" src="{{asset('Frontend/assets/images/mango-1.svg')}}" alt=""></span>
            <span class="col-6 col-lg-1"><img class="img-fluid" src="{{asset('Frontend/assets/images/food2.svg')}}" alt=""></span>
            <span class="col-6 col-lg-1"><img class="img-fluid" src="{{asset('Frontend/assets/images/food.svg')}}" alt=""></span>
            <span class="col-6 col-lg-1"><img class="img-fluid" src="{{asset('Frontend/assets/images/bookoff-corporation-logo.svg')}}"
                alt=""></span>
            <span class="col-6 col-lg-1"><img class="img-fluid" src="{{asset('Frontend/assets/images/gseries.svg')}}" alt=""></span>
          </div>
        </div>
      </div>

    </section>
    <!-- LOGO END HERE-->
@endsection