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
        events: '/app/a',
        eventClick: function(calEvent, jsEvent) {
            jsEvent.preventDefault();
            $('#ivehicle').text(calEvent.vehicle);
            $('#idriver').text(calEvent.driver);
            $('#requester').text(calEvent.requester);
            $('#time_from').text(calEvent.start.toTimeString());

            $('#myModal').modal('show');
            // change the border color just for fun
            $(this).css('border-color', 'red')
            return false;
        }

    });


});