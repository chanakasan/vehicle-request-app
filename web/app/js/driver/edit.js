$(document).ready(function () {
    $('.name-part').change(function () {
        var fn = $('#driver_first_name').val();
        var ln = $('#driver_last_name').val();

        $('#driver_display_name').prop('value', ucfirst(fn)+' '+ucfirst(ln));
    });
});
