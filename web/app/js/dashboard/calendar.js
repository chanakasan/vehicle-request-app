$(document).ready(function () {

    $('#calendar').fullCalendar({
        theme: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        allDayDefault: false,
        draggable: false,
        editable: false,
        events: '/approve/a',
        eventClick: function(calEvent, jsEvent) {
            jsEvent.preventDefault();
            $('#myModal').modal('show');
            // change the border color just for fun
            $(this).css('border-color', 'red')
            return false;
        }

    });


});