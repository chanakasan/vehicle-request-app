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
            calEvent.vehicle ? $('#ivehicle').text(calEvent.vehicle) : $('#pvehicle').hide();
            calEvent.vehicle ? $('#idriver').text(calEvent.driver) : $('#pdriver').hide();
            $('#requester').text(calEvent.requester);
            $('#time_from').text(calEvent.start.toTimeString());

            $('#myModal').modal('show');
            // change the border color just for fun
            $(this).css('border-color', 'red')
            return false;
        }

    });


});