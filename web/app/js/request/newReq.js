$(document).ready(function(){
// jquery chosen plugin
    var config = {
        '.chzn-select'           : {},
        '.chzn-select-deselect'  : {allow_single_deselect:true},
        '.chzn-select-no-single' : {disable_search_threshold:10},
        '.chzn-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chzn-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
// jquery ui datepicker
//    $("#request_pickup_time_datepicker").datepicker({
//        dateFormat: 'yy-mm-dd'
//    });

// jquery timeEntry plugin
//    $('#request_pickup_time_timepicker').timeEntry({
//        show24Hours: true,
//        spinnerImage: ''
//    });
//    $('#request_start_time').timeEntry({
//        show24Hours: true,
//        spinnerImage: ''
//    });
//    $('#request_return_time').timeEntry({
//        show24Hours: true,
//        spinnerImage: ''
//    });

    $(function() {// Init time picker
        $('.req-timepicker').datetimepicker({
            pickDate: false,
//            maskInput: true,
            pickSeconds: false,
            pick12HourFormat: true
        });
    });
    $(function() {// Init date picker
        $('.req-datepicker').datetimepicker({
            pickTime: false
        });
    });
    function toggle_journey(type, is_selected)
    {
        var tag_id = '#'+type+'_journey';

        if (is_selected == true)
        {
            $(tag_id).show();
        }
        else {
            $(tag_id).hide();
        }
    }

//    $('#request_journey_type_0').trigger("change");
//    $('#request_journey_type_1').trigger("change");
//
//    //toggle single journey checkbox
//    $("#request_journey_type_0").change(function(){
//        var type = $(this).val();
//        var is_checked = $(this).is(':selected');
//        toggle_journey(type, is_checked);
//    });
//
//    $('#request_journey_type_0').mousedown(function() {
//        $(this).trigger("change");
//    });
//
//    //toggle return journey checkbox
//    $("#request_journey_type_1").change(function(){
//        var type = $(this).val();
//        var is_checked = $(this).is(':checked');
//        toggle_journey(type, is_checked);
//    });
//
//    $('#request_journey_type_1').mousedown(function() {
//        $(this).trigger("change");
//    });

//    $('#closeBtn').popover();
//    $('#closeBtn').popover('show');
});
