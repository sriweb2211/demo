(function ($) {
	
	'use strict';

	$("#success-alert").hide();

	$.validator.setDefaults( {
		submitHandler: function (form) {
			// alert( "submitted!" );
			// console.log("Before ajaxSubmit");

			jQuery.ajax({
				url:'php/contact-test.php',
				type: "post",
				data: $("#contactForm").serialize(),
				success: function(){
					//alert("success");
					$("#success-alert").slideDown(500).fadeTo(5000, 500).slideUp(500, function(){
					    $("#success-alert").slideUp(500);
					});

					$("#name").val("");
					$("#mobile").val("");
					$("#businessname").val("");
					$("#email").val("");
					$("#type").val("");
					$("#comments").val("");

					// console.log("Form cleared");
				}
    		});

		}
	} );


	$( "#contactForm" ).validate( {
		rules: {
			name: {
				required: true,
				minlength: 3
			},
			mobile: {
				required: true,
				number: true,
				minlength:10
			},
			comments: "required",
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			name: {
				required: "Please enter your name",
				minlength: "Must be at least 3 characters"
			},
			mobile: {
				required: "Please enter your mobile",
				number: "Should a mobile number",
				minlength: "Length should be 10 digit number"
			},
			comments: "Please enter your comments",
			email: { 
				required: "Please enter your email",
				email: "Please enter a valid email address"
			}
		},
		errorElement: "em",
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
		}
	});

})(jQuery)