$(document).ready(function () {
    
    $('#calendar').fullCalendar({
        theme: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        draggable: false,
        editable: false,
        events: '/approve/a'

    });

});