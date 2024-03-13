document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var nbrejours = document.getElementById('nbrejours');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'fr',
        themeSystem: 'bootstrap5',
        height: 800,
        initialView: 'resourceTimelineWeek',
        firstDay: 1,
        dayCount: parseInt(nbrejours.value),
        allDaySlot: true,
        slotDuration: {
            day: 1
        },
        resources: [{
            id: '1',
            title: 'Room 101'
        },
        {
            id: '2',
            title: 'Room 102'
        }
        ]
    });
    nbrejours.addEventListener('change', function () {
        calendar.setOption('dayCount', parseInt(this.value));
    });
    calendar.render();
});