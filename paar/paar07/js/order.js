(function ($) {
	
	'use strict';

	$('#formore').hide();

	$('#qtyText').on('change', function() {
		var qty = $(this).val();

		if (qty >= 5) {
			$('#formore').show();
		} else {
			$('#formore').hide();
		}

		// Razorpay adding the quantity
		// $("div.razorpay-embed-btn").data("url", "https://pages.razorpay.com/pl_FGfvq8ZtC1zoFV/view?amount="+qty);
		$("div.razorpay-embed-btn").attr("data-url", "https://pages.razorpay.com/pl_FGfvq8ZtC1zoFV/view?amount="+qty);
		// console.log($("div.razorpay-embed-btn").data("url"));
	});

})(jQuery)