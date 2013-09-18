$(document).ready(function(){
    /* jquery validate debug mode */
//        jQuery.validator.setDefaults({
//            debug: true
//        });
    /* init jquery validation */
    $('#newVehicle_form').validate({
        errorPlacement: function(label, element) {
            label.addClass('inline text-error');
            label.insertAfter(element);
        },
        wrapper: 'span'
    });

});