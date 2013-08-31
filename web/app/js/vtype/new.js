$(document).ready(function () {

    $('.name-part').change(function () {
        var vtype = $('#vtype_type').val();
        var count = $('#vtype_passengers').val();

        $('#vtype_name').prop('value', count + '-passenger ' + vtype);
    });
});
