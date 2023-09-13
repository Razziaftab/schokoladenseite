$('document').ready(function(){
	
	function projekte(){
		if( $('body').hasClass('desktop') ){

			var mobileRoll = $("#mobile-roll"),
				akf1 = $("#akf"),
				akf2 = $("#akf-servicelease-allgemein"),
				akf3 = $("#akf-konfigurator"),
				akf4 = $("#akf-webdesign"),
				akf5 = $("#akf-webdesign img"),
				dw1 = $("#drweigert"),
				dw2 = $("#dr-weigert-allgemein"),
				dw3 = $("#firmenwebsite"),
				dw4 = $("#dr-weigert-email"),
				dw5 = $("#dr-weigert-cleverreach"),
				dw6 = $("#socialmedia_dw"),
				dw7 = $("#socialmedia_dw img"),
				optonaval1 = $("#optonaval"),
				optonaval2 = $("#optonaval-allgemein"),
				optonaval3 = $("#optonaval-kirby"),
				show = $(akf1).offset().top + $(akf1).height()/2 + 30,
				showRight = ($(window).width() - 1200 + 32)/2,
				offAKF1 = $(akf1).offset().top - $('header').height() + 50,
				offAKF2 = $(akf2).offset().top - 350,
				offAKF3 = $(akf3).offset().top - 550,
				offAKF4 = $(akf4).offset().top - 550,
				offAKF5 = $(akf5).offset().top - 280,
				offAKF5out = $(akf5).offset().top + $(akf5).height() - $(mobileRoll).height() - 100,
				offDW1 = $(dw1).offset().top - 350,
				offDW2 = $(dw2).offset().top - 350,
				offDW3 = $(dw3).offset().top - 350,
				offDW4 = $(dw4).offset().top - 350,
				offDW5 = $(dw5).offset().top - 350,
				offDW5out = $(dw5).offset().top + $(dw5).height() - $(mobileRoll).height() - 100,
				offDW6 = $(dw6).offset().top - 350,
				offDW7 = $(dw7).offset().top - 200,
				offDW7out = $(dw7).offset().top + $(dw7).height() - $(mobileRoll).height() - 100,
				offOPTO1 = $(optonaval1).offset().top - 350,
				offOPTO2 = $(optonaval2).offset().top - 350,
				offOPTO3 = $(optonaval3).offset().top - 350,
				offOPTO3out = $(optonaval3).offset().top + $('header').height() - $(optonaval3).height()/2 + 170,
				showoff = $(optonaval3).offset().top + $(optonaval3).height()/2 + 80;

			$(mobileRoll).css('top',show).css('right',showRight);

			window.addEventListener('scroll', function() {
				if( $(window).scrollTop() >= offAKF1 ){
					$(mobileRoll).css({
						'position' : 'fixed',
						'top' : '50%',
						'z-index': '10000',
					});
				} else {
					$(mobileRoll).css({
						'position' : 'absolute',
						'top' : show,
					});
				}
				if( $(window).scrollTop() >= offAKF2 ){
					$('#akf2').css('opacity','1');
				} else {
					$('#akf2').css('opacity','0');
				}
				if( $(window).scrollTop() >= offAKF3 ){
					$('#akf3').css('opacity','1');
					$('#akf2-tablet').css('opacity','1').css('left','-500px');
				} else {
					$('#akf3').css('opacity','0');
					$('#akf2-tablet').css('opacity','0').css('left','0');
				}
				if( $(window).scrollTop() >= offAKF4 ){
					$('#akf4').css('opacity','1');
					$('#akf2-tablet').css('opacity','0').css('left','0');
				} else {
					$('#akf4').css('opacity','0');
				}
				if( $(window).scrollTop() >= offAKF5 ){
					$('#akf5').css('opacity','1').css('left','-450px');
					$('#akf6').css('opacity','1').css('left','-900px');
				} else {
					$('#akf5').css('opacity','0').css('left','0');
					$('#akf6').css('opacity','0').css('left','0');
				}
				if( $(window).scrollTop() >= offAKF5out ){
					$('#akf5').css('opacity','0').css('left','0');
					$('#akf6').css('opacity','0').css('left','0');
				}
				if( $(window).scrollTop() >= offDW1 ){
					$('#dw1').css('opacity','1');
				} else {
					$('#dw1').css('opacity','0');
				}
				if( $(window).scrollTop() >= offDW2 ){
					$('#dw2').css('opacity','1');
				} else {
					$('#dw2').css('opacity','0');
				}
				if( $(window).scrollTop() >= offDW3 ){
					$('#dw3').css('opacity','1');
					$('#dw2-tablet').css('opacity','1').css('left','-550px');
				} else {
					$('#dw3').css('opacity','0');
					$('#dw2-tablet').css('opacity','0').css('left','0');
				}
				if( $(window).scrollTop() >= offDW4 ){
					$('#dw4').css('opacity','1');
					$('#dw2-tablet').css('opacity','0').css('left','0');
				} else {
					$('#dw4').css('opacity','0');
				}
				if( $(window).scrollTop() >= offDW5 ){
					$('#dw5').css('opacity','1');
					$('#dw4-tablet').css('opacity','1').css('left','-450px');
				} else {
					$('#dw5').css('opacity','0');
					$('#dw4-tablet').css('opacity','0').css('left','0');
				}
				if( $(window).scrollTop() >= offDW5out ){
					$('#dw4-tablet').css('opacity','0').css('left','0');
				}
				if( $(window).scrollTop() >= offDW6 ){
					$('#dw6').css('opacity','1');
				} else {
					$('#dw6').css('opacity','0');
				}
				if( $(window).scrollTop() >= offDW7 ){
					$('#dw7').css('opacity','1').css('left','-450px');
					$('#dw8').css('opacity','1').css('left','-900px');
				} else {
					$('#dw7').css('opacity','0').css('left','0');
					$('#dw8').css('opacity','0').css('left','0');
				}
				if( $(window).scrollTop() >= offDW7out ){
					$('#dw7').css('opacity','0').css('left','0');
					$('#dw8').css('opacity','0').css('left','0');
				}
				if( $(window).scrollTop() >= offOPTO1 ){
					$('#optonaval1').css('opacity','1');
				} else {
					$('#optonaval1').css('opacity','0');
				}
				if( $(window).scrollTop() >= offOPTO2 ){
					$('#optonaval2').css('opacity','1');
				} else {
					$('#optonaval2').css('opacity','0');
				}
				if( $(window).scrollTop() >= offOPTO3 ){
					$('#optonaval3').css('opacity','1');
					$('#optonaval2-tablet').css('opacity','1').css('left','-500px');
				} else {
					$('#optonaval3').css('opacity','0');
					$('#optonaval2-tablet').css('opacity','0').css('left','0');
				}
				if( $(window).scrollTop() >= offOPTO3out ){
					$(mobileRoll).css({
						'position' : 'absolute',
						'top' : showoff,
						'z-index': '0',
					});
				}
			});
		}
	}
	
	projekte();
	
	$(window).resize(function(){
	
		projekte();
	
	});

	
	
});