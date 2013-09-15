$(document).ready(function(){
    /* Switch single/return journey types */
    $(function(){   // set default journey_type to single and hide return time
        $('#request_journey_type_0').prop('checked', true);
        $('#return_journey').hide();
    });

    function switchJourneyType(active)
    {
        active = typeof active !== 'undefined' ? active : true;

        if(active === true)
        {
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
            // show return time
            $("#request_journey_type_1").change(function(e){
                e.preventDefault();
                var is_checked = $(this).is(':checked');
                if(is_checked === true)
                {
                    $('#return_journey').show('slow');
                }
            });
        }
    }

    /* Show/hide accomodation info */
    $('#need_accomodation').change(function(){
        var val = $('#need_accomodation').prop('checked');
        if (val)
        {
            $('#request_accomodation').show('slow');
        }
        else
            $('#request_accomodation').hide('slow');
    });

    /* Trigger switchJourneyType() based on no. of days */
    $(function(){
        var days = $('#request_days').val();
        if(days > 1)
        {
            $('#return_journey').css('display', 'block');
            switchJourneyType(false);
        }
        else {
            switchJourneyType(true);
        }
    });

});
