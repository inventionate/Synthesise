$('.scale').transition('scale in', 1000);

$('.shake').transition('shake');

$('.ui.checkbox').checkbox();

$('.dropdown').dropdown();

$('.ui.accordion').accordion();

$('input:text, .ui.button', '.ui.action.input')
	.on('click', function(e) {
    	$('input:file', $(e.target).parents()).click();
	})
;

$('input:file', '.ui.action.input')
	.on('change', function(e) {
    	var name = e.target.files[0].name;
    	$('input:text', $(e.target).parent()).val(name);
	})
;

$('.special.cards .image').dimmer({
  on: 'hover'
});
