$(document).ready(function(){
    function getReqIdFromUrl()
    {
        var pathArray = window.location.pathname.split( '/' );
        pathArray.reverse();
        return pathArray[0];
    }

    function setRequestId(id)
    {
        $('#req_id_field select').val(id);

    }

    $('#approve_btn').click(function(){
        var r = confirm('Do you really want to approve this request, an email confirmation message will be sent to the requester?');
        if (r === true)
        {
            setRequestId(getReqIdFromUrl());
            return true;
        }
        else
            return false;
    });
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