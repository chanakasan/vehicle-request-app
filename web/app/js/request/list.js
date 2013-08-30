/* Custom filtering for dataTable */
$.fn.dataTableExt.afnFiltering.push(
    function( oSettings, aData, iDataIndex ) {
        var status = aData[4];
        var active_nav_pill = $('#content-nav ul li.active').attr('id'); //@todo: pass this value as a parameter

        if (active_nav_pill == 'pending' && status == 0)
        {
            return true;
        }
        else if (active_nav_pill == 'approved' && status == 1)
        {
            return true;
        }
        else if (active_nav_pill == 'disapproved' && status == 2)
        {
            return true;
        }
        else if (active_nav_pill == 'all')
        {
            return true;
        }
        return false;
    }
);

$(document).ready(function () {
    function dataTableInit() {
        listTable = $('#requests_list').dataTable({
        /* for bootstrap 2 grid */
            "sDom": "<'row dt-info'<'span10 offset1'i>>" +
                "<'row dt-search'<'span4 offset7'f>>" +
                "<'row dt-size'<'span10 offset1'l>>" +
                "<'row dt-table'<'span10 offset1't>>" +
                "<'row dt-pagination'<'span10 offset1'p>>",

            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ items per page",
                "sInfoFiltered": "",
                "sInfo": "Showing _START_ to _END_ items (of total _TOTAL_ items) ",
                "sInfoEmpty": "0 items found"
            }
        });
    }
    dataTableInit(); // Initialize dataTable

    (function(){ // set pending count
        var oSettings = listTable.fnSettings();
        var count = oSettings.fnRecordsDisplay();
        var show_no = count == 0 ? '' : count;
        $('#pending_count').text(show_no);

    })();
    /* Nav pills */
    $('#content-nav ul li').on('click', function(){
        $('ul.nav li').removeClass('active');
        $(this).addClass('active');
        listTable.fnDraw(); // redraw dTable rows
        return false;
    });
});