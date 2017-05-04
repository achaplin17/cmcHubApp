$(function() {
	var pop = $('.popbtn');
	// var itemID = pop.attr('name');
	var row = $('.row:not(:first):not(:last)');


	pop.popover({
		trigger: 'manual',
		html: true,
		container: 'body',
		placement: 'bottom',
		animation: false,
		content: function() {
			return $('#popover').html();
		}
	});



	pop.on('mouseout', function(e) {
		pop.popover('toggle');
		pop.not(this).popover('hide');

		console.log("mouseout function fire");
	});



	pop.on('mouseover', function(e) {
		pop.popover('toggle');
		pop.not(this).popover('hide');

		console.log("mouseover function fire");
	});

	$(window).on('resize', function() {
		pop.popover('hide');
	});

	row.on('touchend', function(e) {
		$(this).find('.popbtn').popover('toggle');
		row.not(this).find('.popbtn').popover('hide');
		console.log("touchend function fire");
		return false;
	});

});