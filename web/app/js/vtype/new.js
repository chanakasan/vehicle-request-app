$(document).ready(function () {
    /* init jquery validation */
    $('form').validate({
        errorPlacement: function(label, element) {
            label.addClass('inline text-error');
            label.insertAfter(element);
        },
        wrapper: 'span'
    });
    $( "#vtype_passengers" ).rules( "add", {
        required: true,
        digits: true,
        min: 1,
        max: 60
    });

    $('.name-part').change(function () {
        var vtype = $('#vtype_type').val();
        var count = $('#vtype_passengers').val();

        $('#display_name').prop('value', count + '-passenger ' + vtype);
        var display_name = $('#display_name').val();
        $('#vtype_name').val(display_name);
    });
});
