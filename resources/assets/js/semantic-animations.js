$('.scale').transition('scale in', 1000);

$('.shake').transition('shake');

$('.ui.checkbox').checkbox();

$('.dropdown').dropdown();

$('.ui.accordion').accordion();

// Semantic UI file upload integration.
$('.ui.action.input input:text, .ui.action.input .ui.button').click(function() {
    	$(this).siblings('input:file').click();
	});

$('.ui.action.input input:file').change(function() {
    	var name = $(this).val().split('\\').pop();
    	$(this).siblings('input:text').val(name);
	});

$('.special.cards .image').dimmer({
  on: 'hover'
});

// @TODO wird in einer künftigen Semantic UI Version enthalten sein!
require('./calendar.js');

$('.ui.calendar').calendar({
	type: 'date',
	text: {
	  days: ['S', 'M', 'D', 'M', 'D', 'F', 'S'],
	  months: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
	  monthsShort: ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
	  today: 'Heute',
	  now: 'Jetzt',
	  am: 'AM',
	  pm: 'PM'
	},
	formatter: {
		date: function (date, settings) {
			if (!date) return '';
			var day = date.getDate();
			var month = date.getMonth() + 1;
			var year = date.getFullYear();
			return day + '.' + month + '.' + year;
		}
	},
});
