$(document).ready(function(){
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