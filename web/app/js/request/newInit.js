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

    /* show tooltips */
    $('.show-tooltip').tooltip();

    /* expand textarea on focus */
    $('textarea.expand').focus(function () {
        $(this).animate({ height: "10em" }, 500);
    });
    $('textarea.expand').focusout(function () {
        $(this).animate({ height: "4em" }, 500);
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
