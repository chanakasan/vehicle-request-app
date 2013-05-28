$(document).ready(function(){
    $( "#requesttype_start_time_datepicker" ).datepicker();
    $( "#requesttype_pickup_time_datepicker" ).datepicker();
    $( "#requesttype_end_time_datepicker" ).datepicker();

    function toggle_journey(value)
    {
        if (value == 'single')
        {
            $('#return_journey').hide();
            $('#single_journey').show();
        }
        else if (value == 'return')
        {
            $('#single_journey').hide();
            $('#return_journey').show();
        }
    }

    var start_value = $("#requesttype_journey_type").val();
    toggle_journey(start_value);

    // when user change the journey type
    $("#requesttype_journey_type").change(function(){
            var new_value = $(this).val();
            toggle_journey(new_value);
    });

});
