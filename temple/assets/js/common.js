!(function ($) {
  "use strict";

  $(document).on('mouseenter', 'div .header_div ul > li a', function (e) {
    url_hide();
    var $href = $(this).attr('id');
    $('.header_'+$href).show();
    $('.header_'+$href).css('opacity','1');
  });

  $(document).on('mouseleave', '.header_url2, .header_url3, .header_url5, .header_url6, .header_url7, .header_url8', function (e) {
    url_hide();
  });
  
  $(document).on('click', '.btn_mail, .btn_line', function (e) {        
    url_hide();
  });

  $(document).on('click', '.topic_close_btn', function (e) {        
    $('.topic_div').hide();
  });
  $(document).on('click', '.topic_close_btn', function (e) {        
    $('.topic_div_sp').hide();
  });

  $(document).on('click', '.topic_close_btn_sp', function (e) {        
    $('.topic_sp').hide();
  });
  
})(jQuery);

//recruitフロートボタン
$(function () {
  $('.f_close_btn').on('click', function () {
  $('.float_btn_box').addClass('hidden');
  });
});

function url_hide() {
  for (var i=2; i<9; i++){
    $('.header_url' + i).css('opacity','0'); 
    $('.header_url' + i).hide();
  }   
}

function f_hamburger_hidden() {
  url_hide();      
  $('.header_hamburger_hidden').toggle();
  $('.header_hamburger_show').toggle();
  $('.header_div').toggle();
  $('.top_div').toggle();
  $('.top_div_hamburger').toggle();
  $('html, body').animate({ scrollTop: 0 }, 'medium');
}

function f_hamburger_show() {
  url_hide();      
  $('.header_hamburger_hidden').toggle();
  $('.header_hamburger_show').toggle();
  $('.header_div').toggle();
  $('.top_div').toggle();
  $('.top_div_hamburger').toggle();
}

function sp_header_div() {
  url_hide();      
  $('.sp_header_div').toggle();
  $('.sp_header_div_show').toggle();
  $('.top_div_sp').toggle();
  $('.top_div_hamburger_sp').toggle();
  // $('html, body').animate({ scrollTop: 0 }, 'medium');
}

function sp_header_div_show() {
  url_hide();      
  $('.sp_header_div').toggle();
  $('.sp_header_div_show').toggle();
  $('.top_div_sp').toggle();
  $('.top_div_hamburger_sp').toggle();
  // $('html, body').animate({ scrollTop: 0 }, 'medium');
}

function gototop() {
  $('html, body').animate({ scrollTop: 0 }, 'medium');
}



var $doc = jQuery(document)
  , $window = jQuery(window);

$doc.ready(function () {
  "use strict";
  var e = jQuery("#go-to-top"), t = !1;
  $window.scroll(function () {
    e.length && (t && window.clearTimeout(t),
      t = window.setTimeout(function () {
        if ($window.scrollTop() > 600) {
          e.addClass("show-top-button"); 
          $('.header_div').addClass('header_div_shadow');
        }
        else {
          e.removeClass("show-top-button");
          $('.header_div').removeClass('header_div_shadow');
        }
      }, 100))
  });
});

function radio_select(num) {
  $("#radio_1_2").prop("checked", false);
  $("#radio_1_1").prop("checked", true);
  switch (num) {
    case 1:
      $(".radio_1_1_help").show();
      $(".radio_1_2_help").hide();
      break;
    case 2:
      $(".radio_1_1_help").hide();
      $(".radio_1_2_help").show();
      break;
  }
}

/* ------------------------------- inherit__review ------------------------------- */

$(document).ready(function(){
  $('.inherit__review .review__wrap').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    infinite: true,
    autoplay: false,
    speed: 500,
    responsive: [
      {
        breakpoint: 728,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          centerMode: true
        }
      }
    ]
  });

});

// close-btn をクリックしたら .zoom__float-btn を非表示にする
document.addEventListener("DOMContentLoaded", () => {
  const closeBtn = document.querySelector(".float-btn__inner .close-btn");
  const floatBtn = document.querySelector(".zoom__float-btn");

  if (!closeBtn || !floatBtn) return;

  closeBtn.addEventListener("click", (e) => {
    // close-btn は <a> の中にあるので、クリック時の遷移を止める
    e.preventDefault();
    e.stopPropagation();

    // 非表示
    floatBtn.style.display = "none";
  });
});

//headerロゴ
document.addEventListener('DOMContentLoaded', () => {
  const header = document.querySelector('#header');
  const fvSection = document.querySelector('.inherit__fv');
  
  if (!header || !fvSection) return;

  const headerHeight = header.offsetHeight;

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // ヘッダーが.inherit__fv上にある
          header.classList.add('header-logo-white');
        } else {
          // ヘッダーが.inherit__fv上にない
          header.classList.remove('header-logo-white');
        }
      });
    },
    {
      // ヘッダーの高さ分だけ上から監視領域を調整
      rootMargin: `-${headerHeight}px 0px 0px 0px`,
      threshold: 0
    }
  );

  observer.observe(fvSection);
});
