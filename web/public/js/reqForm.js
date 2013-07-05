//acme = function(){
//    var locale = "";
//    return{
//        initLocale : function(){
//            if(global.locale){
//                locale = global.locale;
//            }
//            else{
//                //Set a default locale if the user's one is not managed
//                console.error('The locale is missing, default locale will be set (fr_FR)');
//                locale = "fr_FR";
//            }
//        }
//        getLocale : function(length){
//            if(length == 2){
//                return locale.split('_')[0];
//            }
//            return locale;
//        }
//        initDatePicker : function(){
//
//            if($.datepicker.regional[getLocale(4)] != undefined ){
//                $.datepicker.setDefaults( $.datepicker.regional[getLocale(4)] );
//            }else if($.datepicker.regional[getLocale(2)] != undefined){
//                $.datepicker.setDefaults( $.datepicker.regional[getLocale(2) ] );
//            }else{
//                $.datepicker.setDefaults( $.datepicker.regional['']);
//            }
//
//            $('.acmeDatePicker').each(function(){
//                var id_input=this.id.split('_datepicker')[0];
//                var sfInput = $('#'+id_input)[0];
//                if(! (sfInput)){
//                    console.error('An error has occurred while creating the datepicker');
//                }
//                $(this).datepicker({
//                    'yearRange':$(this).data('yearrange'),
//                    'changeMonth':$(this).data('changemonth'),
//                    'changeYear':$(this).data('changeyear'),
//                    'altField' : '#'+id_input,
//                    'altFormat' : 'yy-mm-dd',
//                    'minDate' : null,
//                    'maxDate': null
//                });
//
//                $(this).keyup(function(e) {
//                    if(e.keyCode == 8 || e.keyCode == 46) {
//                        $.datepicker._clearDate(this);
//                        $('#'+id_input)[0].value = '';
//                    }
//                });
//                var dateSf = $.datepicker.parseDate('yy-mm-dd',sfInput.value);
//
//                $(this).datepicker('setDate',dateSf);
//                $(this).show();
//                $(sfInput).hide();
//            })
//        }
//    }();

$(document).ready(function(){
//    function toggle_journey(type, is_checked)
//    {
//        var tag_id = '#'+type+'_journey';
//
//        if (is_checked == true)
//        {
//            $(tag_id).show();
//        }
//        else {
//            $(tag_id).hide();
//        }
//    }
//
//    $('#request_journey_type_0').trigger("change");
//    $('#request_journey_type_1').trigger("change");
//
//    //toggle single journey checkbox
//    $("#request_journey_type_0").change(function(){
//        var type = $(this).val();
//        var is_checked = $(this).is(':checked');
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

});
