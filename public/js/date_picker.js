$( document ).ready(function(){

	$("#datetimepicker_search_anho1").on("dp.change", function (e) {
        $('#datetimepicker_search_anho2').data("DateTimePicker").minDate(e.date);
    });
	
	var day_picker = new Date();

	day_picker.setDate(new Date().getDate() +1);
	$('#datetimepicker_search_anho1').datetimepicker({
	    useCurrent: false,
	    defaultDate: false,
	    ignoreReadonly: true,
	    format: 'MM-YYYY',
	    maxDate: day_picker
	});

	day_picker.setDate(new Date().getDate());
	$('#datetimepicker_search_anho2').datetimepicker({
	    useCurrent: true,
	    defaultDate: false,
	    ignoreReadonly: true,
	    format: 'MM-YYYY',
	    maxDate: day_picker
	});
});