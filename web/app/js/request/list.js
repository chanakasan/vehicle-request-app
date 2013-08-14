$(document).ready(function () {
    /* DataTable initialisation */

    function dataTableInit() {
        $('#requests_list').dataTable({
/* bootstrap 3 */
//            "sDom": "<'row dt-info'<'col-lg-10 col-offset-1'i>>" +
//                "<'row dt-search'<'col-lg-3 col-offset-8'f>>" +
//                "<'row dt-size'<'col-lg-10 col-offset-1'l>>" +
//                "<'row dt-table'<'col-lg-10 col-offset-1't>>" +
//                "<'row dt-pagination'<'col-lg-10 col-offset-1'p>>",
/* bootstrap 2 */
            "sDom": "<'row dt-info'<'span10 offset1'i>>" +
                "<'row dt-search'<'span4 offset7'f>>" +
                "<'row dt-size'<'span10 offset1'l>>" +
                "<'row dt-table'<'span10 offset1't>>" +
                "<'row dt-pagination'<'span10 offset1'p>>",

            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ items per page"
            }
        });
    }

    dataTableInit();

    /* Nav pills */
    $('#content-nav ul.nav-pills li').on('click', function(){
        $('ul.nav li').removeClass('active');
        $(this).addClass('active');
        return false;
    });
});