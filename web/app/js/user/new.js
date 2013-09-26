$(document).ready(function(){
    /* init jquery validation */
    $('#newUser_form').validate({
        errorPlacement: function(label, element) {
            label.addClass('inline text-error');
            label.insertAfter(element);
        },
        wrapper: 'span'
    });

    $( "#user_plainPassword" ).rules( "add", {
        required: true,
        minlength: 5
    });
    $( "#confirm_password" ).rules( "add", {
        required: true,
        equalTo: "#user_plainPassword"
    });

});