/* Template Name: Lezir - Responsive Bootstrap 4 Landing Page Template
   Author: Themesbrand
   Version: 1.0.0
   File Description: Main js file
*/

(function ($) {

    'use strict';

	// STICKY
	$(window).scroll(function() {
	    var scroll = $(window).scrollTop();

	    if (scroll >= 50) {
	        $(".sticky").addClass("nav-sticky");
	        // $("#menuBuy").html('<button class="btn btn-dark my-2 my-sm-0" href="#order">Buy</button>');
	        // $("#menuBuy").html('<a href="#order" class="btn btn-dark btn-sm btn-block">Buy</a>');
	        $("#menuBuy").html('<a href="#order" class="btn btn-dark btn-lg bg-dark">Buy</a>');
	    } else {
	        $(".sticky").removeClass("nav-sticky");
	        $("#menuBuy").html('<a href="#order" class="nav-link">Buy</a>');
	        
	    }
	});


	// SmoothLink
	$('.nav-item a, .mouse-down a').on('click', function(event) {
	    var $anchor = $(this);
	    $('html, body').stop().animate({
	        scrollTop: $($anchor.attr('href')).offset().top - 0
	    }, 1500, 'easeInOutExpo');
	    event.preventDefault();
	});


	// scrollspy
	$("#mySidenav").scrollspy({
	    offset: 70
	});


	// loader
	$(window).on('load', function() {
	    $('#status').fadeOut();
	    $('#preloader').delay(350).fadeOut('slow');
	    $('body').delay(350).css({
	        'overflow': 'visible'
	    });
	});

	// contact

	$('#contact-form').submit(function() {

	    var action = $(this).attr('action');

	    $("#message").slideUp(750, function() {
	        $('#message').hide();

	        $('#submit')
	            .before('')
	            .attr('disabled', 'disabled');

	        $.post(action, {
	                name: $('#name').val(),
	                email: $('#email').val(),
	                comments: $('#comments').val(),
	            },
	            function(data) {
	                document.getElementById('message').innerHTML = data;
	                $('#message').slideDown('slow');
	                $('#cform img.contact-loader').fadeOut('slow', function() {
	                    $(this).remove()
	                });
	                $('#submit').removeAttr('disabled');
	                if (data.match('success') != null) $('#cform').slideUp('slow');
	            }
	        );

	    });

	    return false;

	});

	// feather icon
	feather.replace()

})(jQuery)
