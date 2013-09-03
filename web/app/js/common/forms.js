$(document).ready(function(){
    /* init jquery validation */
    $('form').validate({
        errorPlacement: function(label, element) {
            label.addClass('inline text-error');
            label.insertAfter(element);
        },
        wrapper: 'span'
    });

    $('#del_entry').click(function(){
        var r = confirm('Do you really want to delete this entry ?');
        if (r === true)
        {
            return true;
        }
        else
            return false;
    });
});