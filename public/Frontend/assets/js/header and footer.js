// multiple use header and footer
 // Header load
 fetch('header.html')
 .then(response => response.text())
 .then(data => {
     document.getElementById('header').innerHTML = data;
 })
 .catch(error => console.error('Error loading header:', error));

// Footer load
fetch('newsletter and footer.html')
 .then(response => response.text())
 .then(data => {
     document.getElementById('newsletterAndFooter').innerHTML = data;
 })
 .catch(error => console.error('Error loading footer:', error));


 // BACK TO TOP BUTTON
// $("#backToTop").click(function(){
//     $("html,body").animate({scrollTop: 0}, 500);
//   })
  
  //  back to top button show/hide
  // $(window).scroll(function () {
  //   let scrollTop = $(window).scrollTop();
  //   if (scrollTop >- 1200) {
  //     $('#backToTop').addClass('backToTop');
  //   } else {
  //     $('#backToTop').removeClass('backToTop');
  //   }
  // });