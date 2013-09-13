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

    // set default journey_type to single and hide return time
    $(function(){
        $('#request_journey_type_0').prop('checked', true);
        $('#return_journey').hide();
    });

    $('#request_journey_type_0').mousedown(function() {
        $(this).trigger("change");
    });
    //hide return time
    $("#request_journey_type_0").change(function(e){
        e.preventDefault();
        var is_checked = $(this).is(':checked');
        if(is_checked === true)
        {
            $('#return_journey').hide('slow');
        }
    });

    $('#request_journey_type_1').mousedown(function() {
        $(this).trigger("change");
    });
    /* show return time */
    $("#request_journey_type_1").change(function(e){
        e.preventDefault();
        var is_checked = $(this).is(':checked');
        if(is_checked === true)
        {
            $('#return_journey').show('slow');
        }
    });

    /* show tooltips */
    $('.show-tooltip').tooltip();

    /* expand textarea on focus */
    $('textarea.expand').focus(function () {
        $(this).animate({ height: "10em" }, 500);
    });
    $('textarea.expand').focusout(function () {
        $(this).animate({ height: "4em" }, 500);
    });

    // show/hide accomodation info
    $('#need_accomodation').change(function(){
        var val = $('#need_accomodation').prop('checked');
        if (val)
        {
            $('#request_accomodation').show('slow');
        }
        else
            $('#request_accomodation').hide('slow');
    });

    /* jquery validate debug mode */
//        jQuery.validator.setDefaults({
//            debug: true
//        });
    /* init jquery validation */
    $('#newReq_form').validate({
        errorPlacement: function(label, element) {
            label.addClass('inline text-error');
            label.insertAfter(element);
        },
        wrapper: 'span'
    });
    $( "#request_accomodation_no_days" ).rules( "add", {
        required: true,
        digits: true,
        min: 1,
        max: 60
    });
    $( "#request_accomodation_day_rate" ).rules( "add", {
        number: true,
        min: 1
    });
    $( "#request_accomodation_total_fee" ).rules( "add", {
        required: true,
        number: true,
        min: 1
    });

});
