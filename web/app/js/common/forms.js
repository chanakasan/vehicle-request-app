$(document).ready(function(){
    $('#approve_btn').click(function(){
        var r = confirm('Do you really want to approve this request, an email confirmation message will be sent to the requester?');
        if (r === true)
        {
            return true;
        }
        else
            return false;
    });
});