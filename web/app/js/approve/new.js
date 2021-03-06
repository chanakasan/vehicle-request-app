$(document).ready(function () {

    $('#approve_btn').click(function(){
        var r = confirm('Do you really want to approve this request, an email confirmation message will be sent to the requester?');
        if (r === true)
        {
            setRequestId(getReqIdFromUrl());
            return true;
        }
        else
            return false;
    });

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
            /* set input field values as empty */
            $.each($('#div_cab_service select, #div_cab_service input, #div_cab_service textarea'), function( key, value ) {
                $(value).val('');
            });
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
            /* set input field values as empty */
            $.each($('#div_company_vehicle select'), function( key, value ) {
                $(value).val('');
            });
            $('#div_company_vehicle').hide('slow');
            $('#div_cab_service').show('slow');
        }
    });

});