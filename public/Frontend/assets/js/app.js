// position fixed
$(window).scroll(function () {
  let scrollTop = $(window).scrollTop();

  if (scrollTop >= 100) {
    $("nav").addClass("fixed").removeClass("fixed2");
  } else {
    $("nav").removeClass("fixed").addClass("fixed2");
  }
});


// SM SEARCH BTN 
$(document).ready(function () {
  $(".smSearchBtn .searchIcon").click(function () {
    $(this).hide(); 
    $(".smSearchBtn .closeIcon").show(); 
    $(".smMsearch").addClass("searchSm2");
  });

  $(".smSearchBtn .closeIcon").click(function () {
    $(this).hide(); 
    $(".smSearchBtn .searchIcon").show(); 
    $(".smMsearch").removeClass("searchSm2"); 
  });

  // SLIDER FOR BANNER
  $(".slider").slick({
    autoplay: true,
    autoplaySpeed: 3000,
    dots: true,
    prevArrow: "#bannerLeftArrow",
    nextArrow: "#bannerRightArrow",
    dotsClass: "banner-dots",
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          dots: false,
        },
      },
    ],
  });

  // SLIDER FOR ABOUT US TEAM
  $(".cardMslider").slick({
    lazyLoad: "ondemand",
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: "#teamLeftBtn",
    nextArrow: "#teamRightBtn",
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  // SLIDER FOR TESTIMONIAL
  $(".testMslider").slick({
    lazyLoad: "ondemand",
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: "#testLeftBtn",
    nextArrow: "#testRightBtn",
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  //  FOR INDEX PAGE MIXED  SLIDER
  if(document.querySelector('.mixit')){
  var mixer = mixitup(".mixit");
  };
  // syn
});


// darkmode on/off
$(".darkModeBtn").click(function () {
  $("body").toggleClass("darkMode");
});

//  preloader remove
$(window).on("load", function () {
  $("#preloader").fadeOut(1500);
});

// BACK TO TOP BUTTON
$("#backToTop").click(function () {
  $("html,body").animate({ scrollTop: 0 }, 500);
});

//  back to top button show/hide
$(window).scroll(function () {
  let scrollTop = $(window).scrollTop();
  if (scrollTop > 0) {
    $("#backToTop").addClass("backToTop");
  } else {
    $("#backToTop").removeClass("backToTop");
  }
});

// FOR VIDEO RUN
if(document.querySelector('.venobox')){
$(document).ready(function () {
  $(".venobox").venobox(); // Initialize VenoBox
});
$(".venobox").venobox({
  bgcolor: "#fff", 
  overlayClose: false,
  spinner: "cube-grid", 
  titleattr: "data-title", 
  numeratio: true, 
  infinigall: true, 
});
};

// PRODUCT DETAIL PAGE
$(".slider-for").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: ".slider-nav",
});

$(".slider-nav").slick({
  slidesToShow: 4, // Show smaller thumbnails
  slidesToScroll: 1,
  asNavFor: ".slider-for",
  dots: false,
  centerMode: true,
  prevArrow: false,
  nextArrow: false,
  useTransform: true,
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4, //3
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 4, //2
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 4, //1
        slidesToScroll: 1,
      },
    },
  ],
});

// POPUP WINDOW START
if (document.getElementById('popup')){
document.addEventListener("DOMContentLoaded", () => {
  const popup = document.getElementById("popup");
  const closeBtn = document.querySelector(".close-btn");

  popup.classList.add("show");

  const popupDuration = 100000; // 5000ms = 5 seconds
  setTimeout(() => {
    popup.classList.remove("show");
  }, popupDuration);

  closeBtn.addEventListener("click", () => {
    popup.classList.remove("show");
  });
});
};
// POPUP WINDOW END

// PRODUCT INCREMENT AND DECREMENT
/*let incrementBtn = document.querySelector(".incrementBtn");
let decrementBtn = document.querySelector(".decrementBtn");
let quantityInput = document.querySelector(".quantity input");

function increment() {
  let value = Number(quantityInput.value);
  quantityInput.value = value + 1;

  let price = Number(document.getElementById("price").innerText); // Assuming price is a numeric value inside an element
  let subtotal = document.getElementById("subtotal");

  // Update subtotal
  subtotal.innerText = (value + 1) * price;
}

incrementBtn.addEventListener("click", increment);

function decrement() {
  let value = Number(quantityInput.value);
  if (value > 1) {
    quantityInput.value = value - 1;

    let price = Number(document.getElementById("price").innerText);
    let subtotal = document.getElementById("subtotal");

    // Update subtotal
    subtotal.innerText = (value - 1) * price;
  }
}
decrementBtn.addEventListener("click", decrement);

function convertToPositiveNumber() {
  let value = Math.abs(Number(quantityInput.value)); // Ensure it's a positive number
  quantityInput.value = value;

  let price = Number(document.getElementById("price").innerText);
  let subtotal = document.getElementById("subtotal");

  // Update subtotal
  subtotal.innerText = value * price;
}
quantityInput.addEventListener("keyup", convertToPositiveNumber);
*/

// HOME PAGE COUNTDOWN TIMER
if (document.getElementById('getting-started')){
$(document).ready(function() {
  $("#getting-started").countdown("2025/1/12", function(event) {
    $("#days").text(event.strftime('%D'));
    $("#hours").text(event.strftime('%H'));
    $("#minutes").text(event.strftime('%M'));
    $("#seconds").text(event.strftime('%S'));
  });
});
};


// PRODUCT ALL CATEGORIES SELECT
  document.getElementById('categorySelect').addEventListener('change', function () {
        var selectedUrl = this.value;
        if (selectedUrl) {
            window.location.href = selectedUrl;
        }
    });



