$(document).ready(function () {

    $('#disapprove_btn').click(function(){
        var r = confirm('Do you really want to disapprove this request, an email confirmation message will be sent to the requester?');
        if (r === true)
        {
            setRequestId(getReqIdFromUrl());
            return true;
        }
        else
            return false;
    });

});