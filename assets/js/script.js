function prettyAlert(msg, focus) {
  focus = typeof focus !== 'undefined' ? focus : false;
  swal(
    {
      title: '',
      text: msg,
      type: 'error',
      confirmButtonColor: '#473F3A',
      confirmButtonText: 'Close',
    },
    function() {
      if (focus != false) {
        setTimeout(function() {
          focus.focus();
        }, 500);
      }
    },
  );
}
$(function() {
  $('.navbar-toggler').click(function() {
    console.log('click');
    if ($('.mobile-menu').hasClass('active')) {
      $('.mobile-menu').removeClass('active');
      $('body').removeClass('lock');
    } else {
      $('.mobile-menu').addClass('active');
      $('body').addClass('lock');
    }
  });

  $('a[href="aboutus"]').click(function() {
    $('html, body').animate(
      {
        scrollTop: $('#aboutus').offset().top,
      },
      500,
    );
    return false;
  });

  // $('a[href="check-your-symptoms"]').click(function() {
  //   swal({
  //     title: 'Sorry :(',
  //     text: 'This page is under construction',
  //     type: 'info',
  //     confirmButtonColor: '#60C9E3',
  //     confirmButtonText: 'Close',
  //   });
  //   return false;
  // });

  $('.facebook-share,.twitter-share').click(function(e) {
    e.preventDefault();
    window.open(
      $(this).attr('href'),
      'Share',
      'height=450, width=550, top=' +
        ($(window).height() / 2 - 275) +
        ', left=' +
        ($(window).width() / 2 - 225) +
        ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0',
    );
    return false;
  });
});
