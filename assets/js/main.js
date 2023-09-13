if ('loading' in HTMLImageElement.prototype) {
	var images = document.querySelectorAll('img[loading="lazy"]');
	images.forEach(function (img) {
	img.src = img.dataset.src;
   });
} else {
   const script = document.createElement('script');
   script.src =
	 'lazysizes.min.js';
   document.body.appendChild(script);
}


var p1 = 'brief';
var p2 = '@';
var p3 = 'schokoladenseite';
var p4 = 'net';
var email = p1+p2+p3+'.'+p4;

$('.append-mail').append('<a class="light-contact" title="E-Mail verfassen" href="'+"m"+"a"+"i"+"l"+"t"+"o"+":"+email+'"><i class="fas fa-envelope topicon"></i><span class="hidden-th">'+email+'</span></a>')
$('.append-mail-aside').append('<a title="E-Mail verfassen" href="'+"m"+"a"+"i"+"l"+"t"+"o"+":"+email+'">'+email+'</a>')

// Gender-Switcher  --------------------------------------------------------------------------------

$('.gender-switch').on({
   'keydown': function() {
	   var keycode = (event.keyCode ? event.keyCode : event.which);
	   if(keycode == '13'){
		   var gender = $(this).data('gender');
		   setCookie('gender', gender, '360');
		   location.reload();
	   }
   },
   'click': function () {
	   var gender = $(this).data('gender');
	   setCookie('gender', gender, '360');
	   location.reload();
   }
});


// Theme-Switch----------------------------------------------------------


if(window.matchMedia("(forced-colors: active)").matches){
	if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
		localStorage.setItem("color", "dark");
		$('body').removeClass('light');
		$('body').addClass('dark');
	} else {
		localStorage.setItem("color", "light");
		$('body').removeClass('dark');
		$('body').addClass('light');
	}
	$('.theme-toogle').css('display','none');
} else {
	if (!localStorage.getItem("color")) {
		if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
			localStorage.setItem("color", "dark");
			$('body').removeClass('light');
			$('body').addClass('dark');
		} else {
			localStorage.setItem("color", "light");
			$('body').removeClass('dark');
			$('body').addClass('light');
		}
	} else {
		if( localStorage.getItem("color") === "dark"){
			$('body').removeClass('light');
			$('body').addClass('dark');
		} else {
			$('body').removeClass('dark');
			$('body').addClass('light');
		}
	}
}

$('.theme-toogle').on({
	'keydown': function() {
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			$(this).children('span').css('transition', 'margin-left 0.3s ease');
			if( $('body').hasClass('dark') ){
				$('body').removeClass('dark');
				$('body').addClass('light');
				localStorage.setItem('color','light');
			}
			else {
				$('body').removeClass('light');
				$('body').addClass('dark');
				localStorage.setItem('color','dark');
			}
		}
	},
	'click': function() {
		$(this).children('span').css('transition', 'margin-left 0.3s ease');
		if( $('body').hasClass('dark') ){
			$('body').removeClass('dark');
			$('body').addClass('light');
			localStorage.setItem('color','light');
		}
		else {
			$('body').removeClass('light');
			$('body').addClass('dark');
			localStorage.setItem('color','dark');
		}
	}
});


// Gender-Switcher Seite Animation --------------------------------------------------------------------------------
var mouseover = 0;

$('.logo_gender_selector_ani').on({
   'mouseenter': function(){
	   mouseover = 1;
   },
   'mouseleave': function(){
	   mouseover = 0;
   },
   'focusin': function(){
	   mouseover = 1;
   },
   'focusout': function(){
	   mouseover = 0;
   }
});

   

$('.logo_gender_selector_ani .selector').on({
   'click':function(){
	   var mode = $(this).attr('id');
	   $(this).addClass('active');
	   $(this).siblings('.selector').removeClass('active');
	   $(this).siblings('.text').removeClass('active');
	   $(this).siblings('.text#' + mode + '-text').addClass('active');
	   $('.hier-testen').css('display','none');
   },
   'keydown':function(){
	   var keycode = (event.keyCode ? event.keyCode : event.which);
	   if(keycode == '13'){
		   var mode = $(this).attr('id');
		   $(this).addClass('active');
		   $(this).siblings('.selector').removeClass('active');
		   $(this).siblings('.text').removeClass('active');
		   $(this).siblings('.text#' + mode + '-text').addClass('active');
		   $('.hier-testen').css('display','none');
	   }
   }
});

setInterval(function(){
   if(mouseover === 0){
	   var that = $('.logo_gender_selector_ani .selector.active');
	   var mode;
	   
	   if( $(that).data('nr') == '5' ){
		   $(that).removeClass('active');
		   that = $('#doppelpunkt');
		   mode = 'doppelpunkt';
	   } else {
		   that = $(that).next('.selector');
		   mode = $(that).attr('id');
	   }
	   
	   $(that).addClass('active');
	   $(that).prev('.selector').removeClass('active');
	   
	   $(that).siblings('.text').removeClass('active');
	   $(that).siblings('.text#' + mode + '-text').addClass('active');
   }
}, 1500);






// Header -----------------------------------------------------------------------

$(window).scroll(function() {
   if ($(window).scrollTop() > $('header').outerHeight()) {
	   $('header').addClass('-scrolled');
	   $('.back-to-top').fadeIn();
	   $('.social-icons').css('opacity', 1);

   } else {
	   $('header.-scrolled').removeClass('-scrolled');
	   $('.back-to-top').fadeOut();
   }
});



// Back-to top -----------------------------------------------------------------------

//mouse
$('.back-to-top').click(function(){
   $('html, body').animate({
	   scrollTop : 0}
   ,800);
});

//keyboard
$('.back-to-top').on('keydown', function() {
   var keycode = (event.keyCode ? event.keyCode : event.which);
   if(keycode == '13'){
	   $('html, body').animate({
		   scrollTop : 0}
	   ,800);
   }
});




// Navigation -----------------------------------------------------------------------


// nav Moobile----------
$('.toggle-nav').on({
   'keydown': function() {
	   var keycode = (event.keyCode ? event.keyCode : event.which);
	   if(keycode == '13'){
		   $(this).toggleClass('open');
		   $(this).attr('aria-expanded','true');
		   $('.nav').toggleClass('-open');
		   $('.nav').attr('aria-hidden','false');
	   }
   },
   'click': function () {
	   $(this).toggleClass('open');
	   $(this).attr('aria-expanded','true');
	   $('.nav').toggleClass('-open');
	   $('.nav').attr('aria-hidden','false');
   }
});


$('.nav span.drop-icon').on({
   'keydown': function () {
	   var keycode = (event.keyCode ? event.keyCode : event.which);
	   if(keycode == '13'){
		   if ($(this).hasClass('open')) {
			   $(this).attr('aria-expanded', 'false');
			   $(this).removeClass('open');
			   $(this).find('i').removeClass('fa-angle-up');
			   $(this).parents('li.drop').removeClass('-open');
			   $(this).siblings('a').attr('aria-expanded', 'false');
			   $(this).parents('li.drop').find('ul').attr('aria-hidden', 'true');
		   } else {
			   $(this).attr('aria-expanded', 'true');
			   $(this).addClass('open');
			   $(this).find('i').addClass('fa-angle-up');
			   $(this).parents('li.drop').addClass('-open');
			   $(this).siblings('a').attr('aria-expanded', 'true');
			   $(this).parents('li.drop').find('ul').attr('aria-hidden', 'false');
			   
			   $(this).parents('li.drop').siblings('li').find('span').attr('aria-expanded', 'false');
			   $(this).parents('li.drop').siblings('li').find('span').removeClass('open');
			   $(this).parents('li.drop').siblings('li').find('i').removeClass('fa-angle-up');
			   $(this).parents('li.drop').siblings('li').removeClass('-open');
			   $(this).parents('li.drop').siblings('li').find('.main').attr('aria-expanded', 'false');
			   $(this).parents('li.drop').siblings('li').find('ul').attr('aria-hidden', 'true');
		   }
	   }
   },
   'click': function () {
	   if ($(this).hasClass('open')) {
		   $(this).attr('aria-expanded', 'false');
		   $(this).removeClass('open');
		   $(this).find('i').removeClass('fa-angle-up');
		   $(this).parents('li.drop').removeClass('-open');
		   $(this).siblings('a').attr('aria-expanded', 'false');
		   $(this).parents('li.drop').find('ul').attr('aria-hidden', 'true');
	   } else {
		   $(this).attr('aria-expanded', 'true');
		   $(this).addClass('open');
		   $(this).find('i').addClass('fa-angle-up');
		   $(this).parents('li.drop').addClass('-open');
		   $(this).siblings('a').attr('aria-expanded', 'true');
		   $(this).parents('li.drop').find('ul').attr('aria-hidden', 'false');
		   
		   $(this).parents('li.drop').siblings('li').find('span').attr('aria-expanded', 'false');
		   $(this).parents('li.drop').siblings('li').find('span').removeClass('open');
		   $(this).parents('li.drop').siblings('li').find('i').removeClass('fa-angle-up');
		   $(this).parents('li.drop').siblings('li').removeClass('-open');
		   $(this).parents('li.drop').siblings('li').find('.main').attr('aria-expanded', 'false');
		   $(this).parents('li.drop').siblings('li').find('ul').attr('aria-hidden', 'true');
	   }
   }
});





//Nav Desktop----------

$('.nav li.drop').on({
   'focusin': function() {
	   if ($(window).outerWidth() > 1199) {
		   $('.nav').find('li.drop.-open').not(this).removeClass('-open');
		   $('.nav').find('li.drop.-open').not(this).find('.main').attr('aria-expanded', 'false');
		   $(this).addClass('-open');
		   $(this).find('.main').attr('aria-expanded', 'true');
		   $(this).find('ul').attr('aria-hidden', 'false');
	   }
   },
   'mouseenter': function () {
	   if ($(window).outerWidth() > 1199) {
		   $('.nav').find('li.drop.-open').not(this).removeClass('-open');
		   $(this).addClass('-open');
		   $(this).find('.main').attr('aria-expanded', 'true');
		   $(this).find('ul').attr('aria-hidden', 'false');
	   }
   },
   'mouseleave': function () {
	   if ($(window).outerWidth() > 1199) {
		   $('.nav').find('li.drop.-open').removeClass('-open');
		   $(this).find('.main').attr('aria-expanded', 'false');
		   $(this).find('ul').attr('aria-hidden', 'true');
	   }
   }
});

$('nav li').not('.drop').focusin(function(){
   if ($(window).outerWidth() > 1199) {
	   $('.nav').find('li.drop.-open').removeClass('-open');
   }
});



// Escape to close everything ----------------------------------------------------------------

$(document).keyup(function(e) {
   if (e.keyCode == 27) { 
   
	   //nav
	   $('.nav').find('li.drop.-open').removeClass('-open');
	   $('.nav li.drop').attr('aria-expanded', 'false');
	   $('.nav li.drop').find('ul').attr('aria-hidden', 'true');
	   $('.toggle-nav').removeClass('open');
	   $('.toggle-nav').attr('aria-expanded','true');
	   $('.nav').removeClass('-open');
	   $('.nav').attr('aria-hidden','true');
	   
	   //aside
	   $('.contactmodal').fadeOut();
	   $('.contactmodalbackground').fadeOut();
	   
	   //referenzen
	   $('.overlay-caption').removeClass('active');
	   $('.overlay').remove();

	   //Zoom
	   $('.overlayimg').remove();	
	   $('body').css('overflow', 'auto');
   }
});




// Aside --------------------------------------------------------------------------------------



$('dialog').on({
   'keydown': function() {
	   var keycode = (event.keyCode ? event.keyCode : event.which);
	   if(keycode == '13'){ 
			$('.contactmodal').fadeIn();
			$('.contactmodalbackground').fadeIn();
		   
			var focusableEls = $('.contactmodal').find('.closemodal, .btn, a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input:not([disabled]), select:not([disabled])');
			var firstFocusableEl = focusableEls[0];  
			var lastFocusableEl = focusableEls[focusableEls.length - 1];
			
			$('.contactmodal').on('keydown', function(e) {
				if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
					if ( e.shiftKey ) /* shift + tab */ {
						if (document.activeElement === firstFocusableEl) {
							lastFocusableEl.focus();
							e.preventDefault();
						}
					} else /* tab */ {
						if (document.activeElement === lastFocusableEl) {
							firstFocusableEl.focus();
							e.preventDefault();
						}
					}
				}
			});
			
	   }
   },
   'click': function() {
	   $('.contactmodal').fadeIn();
	   $('.contactmodalbackground').fadeIn();
   }
});

$('.closemodal').on({
	'keydown': function() {
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){ 
			$('.contactmodal').fadeOut();
			$('.contactmodalbackground').fadeOut();
		}
	},
	'click': function() {
		$('.contactmodal').fadeOut();
		$('.contactmodalbackground').fadeOut();
	}
});



// Hero Video Stop --------------------------------------------------------------------

$('#play-pause-video').on({
   'keydown': function() {
	   var keycode = (event.keyCode ? event.keyCode : event.which);
	   if(keycode == '13'){ 
		   if( $(this).hasClass('active') ) {
			   $('#video-background').trigger('play');
			   $(this).removeClass('active');
		   } else {
			   $('#video-background').trigger('pause');
			   $(this).addClass('active');
		   }
	   }
   },
   'click': function() {
	   if( $(this).hasClass('active') ) {
		   $('#video-background').trigger('play');
		   $(this).removeClass('active');
	   } else {
		   $('#video-background').trigger('pause');
		   $(this).addClass('active');
	   }
   }
});



// Scroll Helper ----------------------------------------------------------------

$(function() {
   if(window.location.hash) {
	   $('html, body').animate({
		   scrollTop: $(window.location.hash).offset().top -70 + 'px'
	   }, 1300, 'swing');
		
		if (window.location.hash == '#modalform') { // contactmodal
		   $('.contactmodal').fadeIn();
		   $('.contactmodalbackground').fadeIn();
		}
   } 
});

$('a[href*="#"]:not([href="#"])').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		if (target.length) {
			$('html,body').animate({
				scrollTop: target.offset().top -70 + 'px'
			}, 1000);
			
			if($(target).find('input').length) {
				$(target).find('input').eq(1).focus();
			} else {
				$(target.focus());
			}
			return false;
		}
	}
});


$('.rs-controlpanel-btn.rs-controlpanel-close').on({
   'keydown': function() {
	   var keycode = (event.keyCode ? event.keyCode : event.which);
	   if(keycode == '13'){ 
	   
	   console.log('tre');
			$('.rsbtn_tooltoggle').focus();
	   }
   }
});


// Resizer Helper ----------------------------------------------------------------

$(window).resize(function() {
   
   //close nav by resize
   $('.nav').find('li.drop.-open').removeClass('-open');
   
   //change body Tag
   if( $(window).width() < 768 ){
	   $('body').removeClass('tablet-small').removeClass('tablet-big').removeClass('desktop').addClass('smartphone');
	   $('.nav').attr('aria-hidden', 'true');
   } else if( $(window).width() < 1024 ){
	   $('body').removeClass('smartphone').removeClass('tablet-big').removeClass('desktop').addClass('tablet-small');
	   $('.nav').attr('aria-hidden', 'true');
   } else if( $(window).width() < 1200 ){
	   $('body').removeClass('smartphone').removeClass('tablet-small').removeClass('desktop').addClass('tablet-big');
	   $('.nav').attr('aria-hidden', 'true');
   } else {
	   $('body').removeClass('smartphone').removeClass('tablet-small').removeClass('tablet-big').addClass('desktop');
	   $('.nav').attr('aria-hidden', 'false');
   }
});

//add body Tag
if( $(window).width() < 768 ){
   $('body').addClass('smartphone');
   $('.nav').attr('aria-hidden', 'true');
} else if( $(window).width() < 1024 ){
   $('body').addClass('tablet-small');
   $('.nav').attr('aria-hidden', 'true');
} else if( $(window).width() < 1200 ){
   $('body').addClass('tablet-big');
   $('.nav').attr('aria-hidden', 'true');
} else {
   $('body').addClass('desktop');
}





/*
* Cookie Helper-----------------------------------------------------------------------------------------
*/

function setCookie(key, value, expiry) {
   var expires = new Date();
   expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
   document.cookie = key + '=' + value + ';expires=' + expires.toUTCString()+';path=/';
}
function getCookie(key) {
   var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
   return keyValue ? keyValue[2] : null;
}
function eraseCookie(key) {
   var keyValue = getCookie(key);
   setCookie(key, keyValue, '-1');
}


// underline heading --------------------------------------------------------------------------------------------
   
$.each($('.underline'), function() {
   var that = $(this);
   window.addEventListener('scroll', function() {
	   passive: true; 		
	   if(inViewport(that)){
		   $(that).addClass('active');
	   }
   }, {passive: true});
}); 

function inViewport(testElement){
   var $tOffset = testElement.offset().top,
	   $tHeight = testElement.height(),
	   $winH = window.innerHeight,
	   $scrollY  = (window.pageYOffset + $winH);
   if ($scrollY > ($tOffset + 200)) {
	   return true;
   }
} 	



// Accordion --------------------------------------------------------------------------------------------

$('.accordion .open').on({
   'keydown': function() {
	   var keycode = (event.keyCode ? event.keyCode : event.which);
	   if(keycode == '13'){ 
			$(this).next('div').slideToggle();
			$(this).children('svg').toggleClass('active');
			$(this).attr('aria-expanded', (_, attr) => attr == 'false' ? 'true' : 'false');
	   }
   },
   'click': function() {
	   $(this).next('div').slideToggle();
	   $(this).children('svg').toggleClass('active');
	   $(this).attr('aria-expanded', (_, attr) => attr == 'false' ? 'true' : 'false');
   }
});



// Adventskalender --------------------------------------------------------------------------------------------

$('.adventskalender .day').on({
   'keydown': function() {
	   var keycode = (event.keyCode ? event.keyCode : event.which);
	   if(keycode == '13'){ 
		   var href = $(this).data('href');
		   location.href = href;
	   }
   },
   'click': function() {
	   var href = $(this).data('href');
	   location.href = href;
   }
});



// Slider --------------------------------------------------------------------------------------------


$('.slider').each(function(){
   var that = $(this);
   var bilder = $(this).find('.slider-container');
   var arrows = $(this).find('.slider-head');
   var anzahl = (parseInt($(bilder).attr('data-length')))/2;
   var mouseover = 0;
   var isStopped = 0;

   if( $("body").hasClass("tablet-big") ){
	   anzahl = Math.ceil(anzahl/3);
   } else if( $("body").hasClass("desktop") ){
	   anzahl = Math.ceil(anzahl/2);
   }	
   $(bilder).attr('data-length', anzahl);
   
	$(arrows).children('.fa-chevron-right').on({
		'click': function(){
			var akt = parseInt($(bilder).attr('data-active'));
			if( (akt + 1) == anzahl ){
				akt = 0;
			} else {
				akt = akt + 1;
			}
			transform(akt);
		},
		'keydown': function() {
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){ 
				var akt = parseInt($(bilder).attr('data-active'));
				if( (akt + 1) == anzahl ){
					akt = 0;
				} else {
					akt = akt + 1;
				}
				transform(akt);
			}
		}
	});

   $(arrows).children('.fa-chevron-left').on({
		'click': function(){
			var akt = parseInt($(bilder).attr('data-active'));
			if( akt == 0 ){
				akt = (anzahl - 1);
			} else {
				akt = (akt - 1);
				}
			transform(akt);
		},
		'keydown': function() {
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){ 
				var akt = parseInt($(bilder).attr('data-active'));
				if( akt == 0 ){
					akt = (anzahl - 1);
				} else {
					akt = (akt - 1);
				}
				transform(akt);
			}
		}
   });
   
   $(that).mouseenter(function(){
	   mouseover = 1;
   });
   
   $(that).mouseleave(function(){
	   mouseover = 0;
   });
   
   $('#play-pause-slider').on({
	   'keydown': function() {
		   var keycode = (event.keyCode ? event.keyCode : event.which);
		   if(keycode == '13'){ 
			   if( $(this).hasClass('active') ) {
				   isStopped = 0;
				   $(this).removeClass('active');
			   } else {
				   isStopped = 1;
				   $(this).addClass('active');
			   }
		   }
	   },
	   'click': function() {
		   if( $(this).hasClass('active') ) {
				isStopped = 0;
				$(this).removeClass('active');
		   } else {
				isStopped = 1;
				$(this).addClass('active');
		   }
	   }
	});
   
   setInterval(function(){
	   if(mouseover === 0 && isStopped === 0){
	   var akt = parseInt($(bilder).attr('data-active'));
		   if( (akt + 1) == anzahl ){
			   akt = 0;
		   } else {
			   akt = akt + 1;
		   }
		   transform(akt);
	   }
   },6000);

   function transform(akt){
	   $(bilder).css('transform', 'translate(-' + akt + '00%)');
	   $(bilder).attr('data-active', akt);
   }

   if( !($("body").hasClass("desktop")) ){
	 $(that).swipe( {
		 swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
			 if (direction == "left") {
				 akt = parseInt($(bilder).attr('data-active'));
				 if( (akt + 1) == anzahl ){
					 akt = 0;
					 $(bilder).css('transform', 'translate(0)');
				 } else {
					 akt = akt + 1;
					 $(bilder).css('transform', 'translate(-' + akt + '00%)');
				 }    
				 $(bilder).attr('data-active', akt);
			 }
			 if (direction == "right") {
				 akt = parseInt($(bilder).attr('data-active'));
				 if( akt == 0 ){
					 akt = (anzahl - 1);
					 $(bilder).css('transform', 'translate(-' + (anzahl - 1) + '00%)');
				 } else {
					 akt = (akt - 1);
					 $(bilder).css('transform', 'translate(-' + akt + '00%)');
				 }    
				 $(bilder).attr('data-active', akt);
			 }	
		 },
		threshold:50
	 });
   };
});






// Referenzen --------------------------------------------------------------------------------------------

$(window).scroll(function() {
   $('.slide-element').each(function(){
	   var that = $(this);
	   var $elementPos = $(this).offset().top;
	   var $scrollPos = $(window).scrollTop();

	   var $sectionH = $(this).height();
	   var $h = $(window).innerHeight();
	   var $sectionVert = (($h/2)-($sectionH/4));

	   if (($elementPos - $sectionVert) <= $scrollPos  && ($elementPos - $sectionVert) + $sectionH > $scrollPos){
		   $(this).addClass('active');
		   setTimeout(function(){
			   $(that).children('div:not(:nth-child(2))').css('z-index','0');
		   }, 300);
	   } /*else {
		   $(this).removeClass('active');
		   setTimeout(function(){
			   $(that).children('div:not(:nth-child(2))').css('z-index','-1');
		   }, 300); 
	   }*/
   });
});

$('.slide-element .images div').click(function(){
   var that = $(this);

   $(this).parent('.images').prev('.middle').children('div').css('opacity','0');
   setTimeout(function(){
	   $(that).parent('.images').prev('.middle').children('div').remove();
	   $(that).clone().appendTo($(that).parent('.images').prev('.middle'));
   }, 310);
   setTimeout(function(){
	   $(that).parent('.images').prev('.middle').children('div').css('opacity','1');
   }, 400);
});





// Zoom --------------------------------------------------------------------

$('div.zoom').click(function(){
   var position = $(this).offset(),
	   width = $(this).width(),
	   height = $(this).height(),
	   oriwidth = $(this).data('width'),
	   oriheight = $(this).data('height'),
	   overlaytop = position.top - $(window).scrollTop(),
	   overlayleft = position.left,
	   data = $(this).data('image'), 
	   current = $(window).scrollTop(),
	   off = 20;
   
   $('body').css('overflow', 'hidden');
   
   $('footer').after('<div class="overlay"><div class="lupe"></div><div class="close"></div></div>');
   $('.overlay').after('<img class="overlayimg" src="' + data + '"/>');
   
   $('.overlayimg').css('top', overlaytop);
   $('.overlayimg').css('left', overlayleft);
   $('.overlayimg').css('width', width);
   $('.overlayimg').css('height', height);
   
   if( $('body').hasClass('tablet') ){
	   off = 40;	
   } else if( $('body').hasClass('desktop') ){
	   off = 60;	
   }
   
   setTimeout( function() {
	   $('.overlay').css('opacity', 1); 
	   
	   if( $(window).width() > (oriwidth + off) && $(window).height() > (oriheight + off) ){
		   $('.overlayimg').css('width', oriwidth);
		   $('.overlayimg').css('height', oriheight);
		   $('.overlayimg').css('left', ($(window).width() - oriwidth)/2);
		   $('.overlayimg').css('top', ($(window).height() - oriheight)/2);
	   } else {
		   var newWidth = $(window).width() - off*2;
		   var newHeight = oriheight / oriwidth * newWidth;
		   $('.overlayimg').css('width', newWidth);
		   $('.overlayimg').css('height', newHeight);
		   $('.overlayimg').css('left', ($(window).width() - newWidth)/2);
		   $('.overlayimg').css('top', ($(window).height() - newHeight)/2);
	   }
   }, 200);
   
   $('.lupe, .overlayimg').click(function() {
	   $('.overlayimg').css('width', oriwidth);
	   $('.overlayimg').css('height', oriheight);
   });
   
   $('.close').click(function() {
	   $('.overlay').css('opacity', '0');
	   $('.overlayimg').css('top', overlaytop);
	   $('.overlayimg').css('left', overlayleft);
	   $('.overlayimg').css('width', width);
	   $('.overlayimg').css('height', height);		
	   
	   $('body').css('overflow', 'auto');
	   
	   setTimeout( function() {
		   $('.overlay').remove();
		   $('.overlayimg').remove();
	   }, 300); 
   });
});

// Modulbutton --------------------------------------------------------------------

$('.modulbutton').click(function(){
   var modul = $(this).data('modul');
   
   $('form .modul.hidden').css('display', 'block');
   $('form .modul.hidden input').val(modul);
   
   
});


// Kontaktform Progressbar --------------------------------------------------------------------
/*
var indicator = 0;
var timer = null;
var current = 0;

$('input, textarea').change(function(){
	progressbar();
});

function progressbar() {

	if (current > 0) {
		return
	}

	timer = window.setInterval(() => {
		indicator += 10;
		$('#submit').attr('disabled', 'true');
		$('.spam-indicator .progress').css('width', indicator + '%');
		$('.spam-indicator p').css('display', 'block');

		if (indicator > 25) {
			$('.spam-indicator .progress').addClass('orange')
		}

		if (indicator > 50) {
			$('.spam-indicator .progress').addClass('yellow')
		}

		if (indicator > 75) {
			$('.spam-indicator .progress').addClass('green')
		}

		if (indicator >= 100) {
			$('.spam-indicator .progress').addClass('done')
			$('.spam-indicator p').css('display', 'none');
			$('#submit').attr('disabled', false);

			window.clearInterval(timer)
		}

		current++;
	}, 1000)
}
*/
// Videoplayer ----------------------------------


var video = document.querySelectorAll("audio");

$(video).each(function(i, video) {
    var controls = $(video).siblings('div'),
		play = $(controls).find("#play"),
		stop = $(controls).find("#stop"),
		current = $(controls).find("#current"),
		duration = $(controls).find("#duration"),
		progress = $(controls).find("#progress"),
		timebar = $(controls).find("#timebar"),
		mute = $(controls).find("#mute"),
		volume = $(controls).find("#volume"),
		volumebar = $(controls).find("#volumebar"),
		
		completeloaded = false,
		
		timeDrag = false,
		updatebar = function(x) {
			var maxduration = video.duration;
			var position = x - $(progress).offset().left;
			var percentage = 100 * position / $(progress).width();
			if (percentage > 100) {
				percentage = 100
			}
			if (percentage < 0) {
				percentage = 0
			}
			$(timebar).css('width', percentage + '%');
			video.currentTime = maxduration * percentage / 100
		},
		
		volumeDrag = false,
		updateVolume = function(x, vol) {
			var percentage;
			if (vol) {
				percentage = vol * 100
			} else {
				var position = x - $(volume).offset().left;
				percentage = 100 * position / $(volume).width()
			}
			if (percentage > 100) {
				percentage = 100
			}
			if (percentage < 0) {
				percentage = 0
			}
			$(volumebar).css('width', percentage + '%');
			video.volume = percentage / 100;
			if (video.volume == 0) {
				$(mute).addClass('muted')
			} else if (video.volume > 0.5) {
				$(mute).removeClass('muted')
			} else {
				$(mute).removeClass('muted')
			}
		},
	
		timeFormat = function(seconds) {
			var m = Math.floor(seconds / 60) < 10 ? "0" + Math.floor(seconds / 60) : Math.floor(seconds / 60);
			var s = Math.floor(seconds - (m * 60)) < 10 ? "0" + Math.floor(seconds - (m * 60)) : Math.floor(seconds - (m * 60));
			return m + ":" + s
		},
		
		playpause = function() {
			if (video.paused || video.ended) {
				$(play).addClass('paused');
				video.play()
			} else {
				$(play).removeClass('paused');
				video.pause()
			}
		};
		
	//Videoload
		
    $(video).on('loadedmetadata', function() {
        $(current).text(timeFormat(0));
        $(duration).text(timeFormat(video.duration));
        updateVolume(0, 0.7)
    });
	
    $(video).on('timeupdate', function() {
        var percentage = 100 * video.currentTime / video.duration;
        $(timebar).css('width', percentage + '%');
        $(current).text(timeFormat(video.currentTime));
    });
	
    $(video).on('canplay', function() {
        $('.loading').fadeOut(100);
    });
	
    $(video).on('canplaythrough', function() {
        completeloaded = true;
    });
	
    $(video).on('ended', function() {
        $(play).removeClass('paused');
        video.pause();
    });
	
    $(video).on('seeking', function() {
        if (!completeloaded) {
            $('.loading').fadeIn(200);
        }
    });
	
    $(video).on('seeked', function() {});
    $(video).on('waiting', function() {
        $('.loading').fadeIn(200);
    });
	
	//Controls
	
    $(play).on({
		'keydown': function() {
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){ 
				playpause();
			}
		},
		'click': function() {
			playpause();
		}
    });
	
    $(stop).on({
		'keydown': function() {
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){ 
				$(play).removeClass('paused');
				video.currentTime = 0;
				video.pause();
				updatebar(0);
			}
		},
		'click': function() {
			$(play).removeClass('paused');
			video.currentTime = 0;
			video.pause();
			updatebar(0);
		}
    });
			
	//Progressbar move
	
    $(progress).on({
		'keydown': function(e) {
			if (e.keyCode === 37 || e.keyCode === 38) {
				video.currentTime = video.currentTime - 10;
				e.preventDefault;
			} else if (e.keyCode === 39 || e.keyCode === 40) {
				video.currentTime = video.currentTime + 10;
				e.preventDefault;
			}
		},
		'mousedown': function(e) {
			timeDrag = true;
			updatebar(e.pageX);
		}
    });
	
    $(document).on('mouseup', function(e) {
        if (timeDrag) {
            timeDrag = false;
            updatebar(e.pageX);
        }
    });
	
    $(document).on('mousemove', function(e) {
        if (timeDrag) {
            updatebar(e.pageX);
        }
    });
	
	//Volumebar move
	
	$(volume).on({
		'keydown': function(e) {
			if (e.keyCode === 37 || e.keyCode === 38) {
				newVolume = video.volume - 0.1;
				
				if(newVolume >= 0){					
					updateVolume(0, newVolume)
				}
				
				e.preventDefault;
			} else if (e.keyCode === 39 || e.keyCode === 40) {
				newVolume = video.volume + 0.1;
				
				if(newVolume <= 1){					
					updateVolume(0, newVolume)
				}
				
				e.preventDefault;
			}
		},
		'mousedown': function(e) {
			volumeDrag = true;
			video.muted = false;
			$(mute).removeClass('muted');
			updateVolume(e.pageX);		
		}
    });
	
    $(document).on('mouseup', function(e) {
        if (volumeDrag) {
            volumeDrag = false;
            updateVolume(e.pageX);
        }
    });
	
    $(document).on('mousemove', function(e) {
        if (volumeDrag) {
            updateVolume(e.pageX);
        }
    })
})



//  Open "Support-Center" Link in new tab -------------------------------------------------------------

$('nav > ul > li:nth-child(4) > ul > li:nth-child(3) > a[href^="http"]').attr('target', '_blank');



// Agentur Page Logos --------------------------------------------------------------------------------------------

$('.show-more-logos').on({
	'keydown': function() {
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){ 
			var show = parseInt($(this).parent('p').prev('.logos').attr('data-show')) + 12;
			var all = $(this).parent('p').prev('.logos').children('li').length;
			var i = 0;

			console.log(all);

			$(this).parent('p').prev('.logos').attr('data-show',show);

			$(this).parent('p').prev('.logos').children('li').each(function(){
				if(i < show){
					$(this).css('display','flex');
					$(this).attr('aria-hidden', 'false');
				}
				i += 1;
			});
			
			if (show > all){
				$(this).css('display','none');
			}
		}
	},
	'click': function() {
		var show = parseInt($(this).parent('p').prev('.logos').attr('data-show')) + 12;
		var all = $(this).parent('p').prev('.logos').children('li').length;
		var i = 0;

		console.log(all);

		$(this).parent('p').prev('.logos').attr('data-show',show);

		$(this).parent('p').prev('.logos').children('li').each(function(){
			if(i < show){
				$(this).css('display','flex');
				$(this).attr('aria-hidden', 'false');
			}
			i += 1;
		});
		
		if (show > all){
			$(this).css('display','none');
		}
	}
});