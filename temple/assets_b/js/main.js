$(document).ready(function () {


  $('a[href^="#"]').click(function () {

      var wWidth = $(window).width();

      if ($($(this).attr('href')).length) {
          var p = $($(this).attr('href')).offset();


          if (wWidth <= 640) {
              $('html,body').animate({
                  scrollTop: p.top - 0
              }, 1500);


          } else {
              $('html,body').animate({
                  scrollTop: p.top - 0
              }, 1500);


          }
      }
      return false;
  });


  $('.sp-menu').on('click', function () {
      $(this).toggleClass('open');
      $('nav').fadeToggle();
  });


  var anim = function () {

      var st1 = ($('html').scrollTop() > 0) ? $('html').scrollTop() : 0;
      var st2 = ($('body').scrollTop() > 0) ? $('body').scrollTop() : 0;
      var st = (st1 > st2) ? st1 : st2;

      $('.anim').each(function () {

          var triggerPos = st + (window.innerHeight * 0.85);

          if (triggerPos >= $(this).offset().top && !$(this).hasClass('is-animated')) {
              $(this).addClass('is-animated');
          }
      });
  };


  $(window).on('load scroll', function () {

      var wWidth = $(window).width();


      anim();

      $(".service-content__wrapper .content__wrapper .c__item").each(function () {
          var winScroll = $(window).scrollTop();
          var winHeight = $(window).height();
          var scrollPos = winScroll + (winHeight * 0.1);
          // alert("dd");
          if ($(this).offset().top < scrollPos) {
              $(".service-content__wrapper .content__wrapper .c__item").removeClass("fixed");
              $(this).addClass("fixed");

          } else {
              $(this).removeClass("fixed");

          }
      });

  });


});

$(document).on('click', '.close__btn', function (e) {
	$('#flagForm').submit();
});

$(document).on('click', '#consult_btn', function (e) {
	$('#flagForm').submit();
})
