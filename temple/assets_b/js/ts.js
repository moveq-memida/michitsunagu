
$(function(){

	// var platform = require('platform');

	// IOS/ IPAD å¯¾å¿œ
	// =======================================================
	if(navigator.userAgent.indexOf('iPhone') > 0 ||
	   navigator.userAgent.indexOf('iPod') > 0 ){
		$('body').addClass('ios');
	}else if (navigator.userAgent.indexOf('iPad') > 0 ){
	 $('body').addClass('ios');
	}else if (navigator.userAgent.indexOf('Safari') > 0 && typeof document.ontouchstart !== 'undefined') {
		$('body').addClass('ios');
	}

	//Edgeã€IE11ã«å¯¾å¿œã™ã‚‹ãŸã‚ã®JS
	APNG.ifNeeded().then(function () {
		var images = document.querySelectorAll(".apng-image");
		for (var i = 0; i < images.length; i++) APNG.animateImage(images[i]);
	});

	// IE ALERT
	//--------------------------------------------------------

	// if(platform.name == "IE") {
	// 	var ieDiv = document.createElement('div');
	// 	ieDiv.classList.add('ie_alert');
	// 	ieDiv.innerHTML = '<div class="ie_alertbox"><div class="box"><p>ã”åˆ©ç”¨ã®ã‚¤ãƒ³ã‚¿ãƒ¼ãƒãƒƒãƒˆãƒ–ãƒ©ã‚¦ã‚¶ã¯ã€å½“ã‚µã‚¤ãƒˆã®æŽ¨å¥¨ç’°å¢ƒã§ã¯ã‚ã‚Šã¾ã›ã‚“ã€‚<br>Webã‚µã‚¤ãƒˆã®å‹•ä½œãŒä¿è¨¼ã§ãã¾ã›ã‚“ã®ã§ã€æœ€æ–°ã® Google Chrome ã‚’ã”åˆ©ç”¨ãã ã•ã„ã€‚</p></div></div>';
	// 	document.getElementsByTagName('body')[0].appendChild(ieDiv);
	// }


	// $(function() {
	// 	var h = $(window).height();
	// 	$('#wrap,#wrapper').css('opacity','1');
	// 	$('#loading ,#loading .in').height(h).css('opacity','1');
	// });

	// $(window).on('load', function() {
	// 	$('#loading').delay(900).fadeOut(800);
	// 	$('#loading .in').delay(600).fadeOut(300);
	// 	$('#wrap,#wrapper').css('opacity', '1');
	// });


	// $(function(){
	// 	setTimeout('stopload()',10000);
	// });

	// function stopload(){
	// 	$('#wrap,#wrapper').css('opacity','1');
	// 	$('#loading').delay(900).fadeOut(800);
	// 	$('#loading .in').delay(600).fadeOut(300);
	// }


	
	$(function() {
		var loading = $('#loading');
		var logo = loading.find('.logo');
		if (loading.length) {
			// $('body').css('overflow-y', 'hidden');
			gsap.to(logo, 2.5, {opacity: 1, ease: Power0.ease });
			gsap.to(loading, 1.5, {delay: 3, opacity: 0, ease: Power0.ease, onComplete: function(){
				loading.hide();
			}});
		}else {
		}
	});

	// $(window).on('load', function() {
	// 	$('#loading').delay(900).fadeOut(800);
	// 	$('#loading .in').delay(600).fadeOut(300);
	// 	$('#wrap,#wrapper').css('opacity', '1');
	// });


	$(function(){
		setTimeout('stopload()',10000);
	});

	function stopload(){
		var loading = $('#loading');
		var logo = loading.find('.logo');
		if (loading.length) {
			// $('body').css('overflow-y', 'hidden');
			gsap.to(logo, 2.5, {opacity: 1, ease: Power0.ease });
			gsap.to(loading, 1.5, {delay: 3, opacity: 0, ease: Power0.ease, onComplete: function(){
				loading.hide();
			}});
		}else {
		}
	}



	// SMOOTH SCROLL
	// =======================================================

	$('a[href^="#"]:not(.noanker)').click(function(){
		var headerHeight = $('#header').outerHeight();
		let speed = 500;
		let href= $(this).attr("href");
		let target = $(href == "#" || href == "" ? 'html' : href);
		let position = target.offset().top;
		$("html, body").animate({scrollTop:position - headerHeight}, speed, "swing");
		return false;
	});

	$(window).on( 'load', function () {
		var headerHeight = $('#header').outerHeight();
		var urlHash = location.hash;
		// console.log(urlHash);
		if(urlHash) {
			$('body,html').stop().scrollTop(0);
			setTimeout(function(){
				var target = $(urlHash);
				var position = target.offset().top - headerHeight;
				$('body,html').stop().animate({scrollTop:position}, 500);
			}, 100);
		}
	});


	$(".navBtn").on('click', function(event) {
		$(this).toggleClass('active');
		$('body').toggleClass('open');
		return false;
	});


	$('#navigation .has_child').click(function(e){
		var w = $(window).width();
		var x = 979;
		if (w < x) {
			e.preventDefault();
			$(this).next().slideToggle(400);
			$(this).toggleClass('open');
		}else{
			e.preventDefault();
		}
	});

	$('#navigation .has_child').hover(function(e) {
		var w = $(window).width();
		var x = 979;
		if (w > x) {
			e.preventDefault();
			$(this).next().toggleClass('active');
		}
	});

	var $navBtn = $("#navBtn");
	var tl = gsap.timeline({ paused: true });
	tl
		.to(".nav_bg span", 0.4, { skewX: '10deg', stagger:0.1, ease: Power0.ease })
		.to(".nav_bg span", 0.2, { scaleX: 1, stagger:0.05, ease: Power0.ease}, '-=0.3')
		.to('#navigation li', 0.3, { y: 0, opacity: 1, visibility: 'visible', stagger: 0.05, ease: Sine.easeInOut }, '-=0.3');

	tl.reverse();

	$navBtn.on('click', function(){
		tl.reversed(!tl.reversed());
		$(this).toggleClass('open');
		$('body').toggleClass("open");
		$('#navigation').toggleClass("open");
	});
	


	// SCROLL
	// =======================================================

	var $header = $('#header');

	$(window).on( 'scroll', function () {
		//ã‚¹ã‚¯ãƒ­ãƒ¼ãƒ«ä½ç½®ã‚’å–å¾—
		if ( $(this).scrollTop() < 300 ) {
			$header.removeClass('is_scrool');
		} else {
			$header.addClass('is_scrool');
		}

	});

	// ã‚¢ã‚³ãƒ¼ãƒ‡ã‚£ã‚ªãƒ³ãƒ¡ãƒ‹ãƒ¥ãƒ¼

	$(".accordion").click(function(){
		$(this).find('.accordion_outer').next().slideToggle();
		$(this).find('.accordion_outer').toggleClass("open");
		// $(".accordion_outer").not(this).removeClass("open").next().slideUp();
	});



	// $(window).on('load', function(event) {

	// 	var top_url = $('.logo a').attr('href');

	// 	if($("#bg01").length) {
	// 		lottieObj01 = lottie.loadAnimation({
	// 			container: document.getElementById('bg01'),
	// 			renderer: 'svg',
	// 			loop: true,
	// 			autoplay: true, // è‡ªå‹•å†ç”Ÿã•ã›ãªã„ã‚ˆã†ã«
	// 			path: top_url+'wp/wp-content/themes/Bell/assets/json/data.json'
	// 		});
	// 		// ScrollTrigger.create({
	// 		// 	trigger: '#bg01',
	// 		// 	start: 'top 0%',
	// 		// 	// markers: true,
	// 		// 	onEnter: function(){
	// 		// 		lottieObj01.play();
	// 		// 	}
	// 		// });
	// 	}

	// });


	// Glitch Effect

	setTimeout(() => document.body.classList.add('render'), 60);
	const navdemos = Array.from(document.querySelectorAll('nav.demos > .demo'));
	const total = navdemos.length;
	const current = navdemos.findIndex(el => el.classList.contains('demo--current'));

	const navigate = (linkEl) => {
		document.body.classList.remove('render');
		document.body.addEventListener('transitionend', () => window.location = linkEl.href);
	};
	navdemos.forEach(link => link.addEventListener('click', (ev) => {
		ev.preventDefault();
		navigate(ev.target);
	}));
	document.addEventListener('keydown', (ev) => {
		const keyCode = ev.keyCode || ev.which;
		let linkEl;
		if ( keyCode === 37 ) {
			linkEl = current > 0 ? navdemos[current-1] : navdemos[total-1];
		}
		else if ( keyCode === 39 ) {
			linkEl = current < total-1 ? navdemos[current+1] : navdemos[0];
		}
		else {
			return false;
		}
		navigate(linkEl);
	});
	imagesLoaded('.glitch__img', { background: true }, () => {
		document.body.classList.remove('loading');
		document.body.classList.add('imgloaded');
	});


});



$(function(){
	let $caption = $('.temp_column .img img');
	$caption.mgGlitch({
		destroy : false,
		glitch: true,
		scale: true,
		blend : true,
		blendModeType : 'hue',
		glitch1TimeMin : 500,
		glitch1TimeMax : 1000,
		glitch2TimeMin : 10,
		glitch2TimeMax : 100,
		zIndexStart : 11,
	});
});






