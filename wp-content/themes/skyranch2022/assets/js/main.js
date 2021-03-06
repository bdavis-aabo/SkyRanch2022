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


	var cardH = $('.blog-post > .front > .article-image').width();
	$('.article-container > .card').css('height', cardH + 'px');

	//email to script
  function mailToForm(){
    var emailTo = [];
    var builder = [];

    $.each($('input.mailto_check:checked'), function(){
      emailTo.push($(this).attr('data-mailto'));
      //builder.push($(this).attr('data-builder'));
    });
    $('#mailto').val(emailTo.join(', '));
  }
  $('input.mailto_check').change(function(){
    mailToForm();
  });

});
