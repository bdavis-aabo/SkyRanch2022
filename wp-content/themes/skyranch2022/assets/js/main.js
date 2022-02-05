$(document).ready(function(){

	// Nav menu function
	$('.nav-btn').click(function(){
    $('html, body').toggleClass('stuck');
    $('.header-right').toggleClass('is-visible');
    $('.header-top').toggleClass('open');
    $(this).toggleClass('open');
  });

	// Show Contact Form
	$('.contactBtn').click(function(){
		if($('.header-right').hasClass('is-visible')) {
			$('.nav-btn').removeClass('open');
			$('.header-right').removeClass('is-visible');
			$('html, body').removeClass('stuck');
		}

		$('.contact-form-section').addClass('is-visible');
	});

	$('.closeContactForm').click(function(){
		$('.contact-form-section').removeClass('is-visible');
	});
});
