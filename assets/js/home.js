$(function() {
  var breakpoint = window.matchMedia('(min-width:992px)');
  var aboutusSwiper;
  var blogSwiper;
  var breakpointChecker = function() {
    if (breakpoint.matches === true) {
      disableSwiper();
      return;
    } else if (breakpoint.matches === false) {
      return enableSwiper();
    }
  };
  var enableSwiper = function() {
    aboutusSwiper = new Swiper('#aboutus .swiper-container', {
      loop: true,
      pagination: {
        el: '#aboutus .swiper-pagination',
      },
      breakpoints: {
        767: {
          slidesPerView: 1,
        },
        991: {
          slidesPerView: 2,
        },
        1199: {
          slidesPerView: 3,
        },
      },
    });
    blogSwiper = new Swiper('#blog .swiper-container', {
      loop: true,
      pagination: {
        el: '#blog .swiper-pagination',
      },
      breakpoints: {
        767: {
          slidesPerView: 1,
        },
        991: {
          slidesPerView: 2,
        },
        1199: {
          slidesPerView: 3,
        },
      },
    });
  };
  var disableSwiper = function() {
    if (aboutusSwiper !== undefined) {
      aboutusSwiper.destroy();
    }
    if (blogSwiper !== undefined) {
      blogSwiper.destroy();
    }
    $('.swiper-pagination').html('');
  };
  breakpoint.addListener(breakpointChecker);
  breakpointChecker();
});
