$(document).ready(function(){
    $( "#request_start_time_datepicker" ).datepicker();
    $( "#request_pickup_time_datepicker" ).datepicker();
    $( "#request_end_time_datepicker" ).datepicker();

    function toggle_journey(type, is_checked)
    {
        var tag_id = '#'+type+'_journey';

        if (is_checked == true)
        {
            $(tag_id).show();
        }
        else {
            $(tag_id).hide();
        }
    }

    $('#request_journey_type_0').trigger("change");
    $('#request_journey_type_1').trigger("change");

    //toggle single journey checkbox
    $("#request_journey_type_0").change(function(){
        var type = $(this).val();
        var is_checked = $(this).is(':checked');
        toggle_journey(type, is_checked);
    });

    $('#request_journey_type_0').mousedown(function() {
        $(this).trigger("change");
    });

    //toggle return journey checkbox
    $("#request_journey_type_1").change(function(){
        var type = $(this).val();
        var is_checked = $(this).is(':checked');
        toggle_journey(type, is_checked);
    });

    $('#request_journey_type_1').mousedown(function() {
        $(this).trigger("change");
    });

});
