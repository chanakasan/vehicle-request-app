$(document).ready(function () {

    // By default, select company vehicle and hide cab details
    $(function(){
        $('#vehicle_company').prop('checked', true);
        $('#div_cab_service').hide();
    });

    $('.assign_vehicle').mousedown(function() {
        $(this).trigger("change");
    });

    //hide cab detalis
    $("#vehicle_company").change(function(e){
        e.preventDefault();
        var is_checked = $(this).is(':checked');
        if(is_checked === true)
        {
            $('#div_cab_service').hide('slow');
            $('#div_company_vehicle').show('slow');
        }
    });
    // hide company vehicle details
    $("#vehicle_cab").change(function(e){
        e.preventDefault();
        var is_checked = $(this).is(':checked');
        if(is_checked === true)
        {
            $('#div_company_vehicle').hide('slow');
            $('#div_cab_service').show('slow');
        }
    });

    /* init jquery validation */
    $('#approve_form').validate({
           errorPlacement: function(label, element) {
               label.addClass('inline text-error');
               label.insertAfter(element);
           },
           wrapper: 'span'
    });

    /* jquery validate debug mode */
        jQuery.validator.setDefaults({
            debug: true
        });

});