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
	});

})(jQuery)