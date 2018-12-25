$( document ).ready(function() {

    $('#form-error').hide();
    $(".alert-success").hide().delay(5000).fadeOut();
	$('#manufecturer_add_form').submit(function(event) {
	    var manufacture = $('#manufecturer_name').val();
	    if (manufacture  === '') {
	    	$('#form-error').html($('#manufecturer_name').attr('data-error')).show();
	        return false;
	    }
	    //event.preventDefault();
	});
});







