$(document).ready(function () {
    /* DataTable initialisation */

    function dataTableInit() {
        $('#requests_list').dataTable({
            "sDom": "<'row dt-info'<'col-lg-10 col-offset-1'i>>" +
                "<'row dt-search'<'col-lg-3 col-offset-8'f>>" +
                "<'row dt-size'<'col-lg-10 col-offset-1'l>>" +
                "<'row dt-table'<'col-lg-10 col-offset-1't>>" +
                "<'row dt-pagination'<'col-lg-10 col-offset-1'p>>",

            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ items per page"
            }
        });
    }

    dataTableInit();

    /* Colorbox */
    $('.iframe').colorbox({width: "70%", height: "80%", iframe: true});

    /* Update pending count */
    var pending_count = $('#list1 .warning').length;
    $('#pending').text(pending_count);

    /* Update status */
    $('.approve').on('click', function () {
        var row = $(this).closest('tr');
        $(row).attr('class', 'success');
        return false;
    });
    $('.decline').on('click', function () {
        var row = $(this).closest('tr');
        $(row).addClass('danger');
        return false;
    });

    /* Nav pills */
    $('ul.nav li').on('click', function(){
        $('ul.nav li').removeClass('active');
        $(this).addClass('active');
        return false;
    });
});