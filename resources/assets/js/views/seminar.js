$('.ui.message.shake').transition('shake');


$('#edit-lection')
    //.modal('setting', 'transition', 'vertical flip')
    .modal('attach events', 'td.edit > div.ui.button', 'show');



$('td.edit > div.ui.button').click( function() {

var name = $(this).attr('data-name');
$('#edit-lection-name').attr('placeholder',name);

var lecturer = $(this).attr('data-lecturer');
$('#edit-lection-lecturer').attr('placeholder',lecturer);

var section = $(this).attr('data-section');
$('#edit-lection-section').attr('placeholder',section);

var lectionAvailable = $(this).attr('data-lection-available');
$('#edit-lection-available').val(lectionAvailable);

});
