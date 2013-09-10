$(document).ready(function(){

    $(function() {// Init date picker
        $('.report-datepicker').datetimepicker({
            pickTime: false
        });
    });
    // Disable checkboxes - only for testing
    $("input:checkbox").click(function() { return false; });
});
