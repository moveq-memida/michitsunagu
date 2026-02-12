!(function ($) {
  "use strict";
  
  $(document).on('mouseenter', '.service-right', function (e) {
    $('.service-right .service-item-content .text').css('color','white');
    $('.service-right .service-item-content .text').css('font-size','1.6rem');
    $('.service-right .service-item-content .text').css('margin-top','3.6rem');
    $('.service-right .service-item-content .subttl').hide();
    $('.service-right .service-item-content .ttl').hide();
    $('.service-right .service-item-content .text').show();
  });
  $(document).on('mouseleave', '.service-right', function (e) {
    $('.service-right .service-item-content .subttl').show();
    $('.service-right .service-item-content .ttl').show();
    $('.service-right .service-item-content .text').css('margin-top','0');
    $('.service-right .service-item-content .text').css('font-size','1.4rem');
    $('.service-right .service-item-content .text').css('color','#363744');
    if (window.innerWidth > 640) $('.service-right .service-item-content .text').hide();
  });

  
  $(document).on('mouseenter', '.service-left', function (e) {
    $('.service-left .service-item-content .text').css('color','white');
    $('.service-left .service-item-content .text').css('font-size','1.6rem');
    $('.service-left .service-item-content .text').css('margin-top','3.6rem');
    $('.service-left .service-item-content .subttl').hide();
    $('.service-left .service-item-content .ttl').hide();
    $('.service-left .service-item-content .text').show();
  });
  $(document).on('mouseleave', '.service-left', function (e) {
    $('.service-left .service-item-content .subttl').show();
    $('.service-left .service-item-content .ttl').show();
    $('.service-left .service-item-content .text').css('color','#363744');
    $('.service-left .service-item-content .text').css('margin-top','0');
    $('.service-left .service-item-content .text').css('font-size','1.4rem');
    if (window.innerWidth > 640) $('.service-left .service-item-content .text').hide();
  });

  var owl;		
  $(document).ready(function () {
    owl = $('.owl-carousel');		
    owl.owlCarousel({
      margin: 20,
      loop: false,
      autoWidth: true,
      dots: false,
      responsive: {
      0: {
      items: 1
      },
      600: {
      items: 2
      },
      1000: {
      items: 3
      }
      }
    });
    });

  $(document).on('click', '.owl-next', function (e) {
      owl.trigger('next.owl');
  });
  $(document).on('click', '.owl-prev', function (e) {
      owl.trigger('prev.owl');
  });

})(jQuery);
