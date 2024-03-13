var dp = new DayPilot.Scheduler("dp");

// behavior and appearance
dp.theme = "scheduler_8";
dp.cellWidth = 40;

// view
dp.startDate = new DayPilot.Date.today().firstDayOfMonth();
dp.days = dp.startDate.daysInMonth();
dp.scale = "Day";
dp.timeHeaders = [{
    groupBy: "Month"
},
{
    groupBy: "Day",
    format: "d"
}
];

// bubble, with async loading
dp.bubble = new DayPilot.Bubble({
    onLoad: function (args) {
        var ev = args.source;
        args.async = true; // notify manually using .loaded()

        // simulating slow server-side load
        setTimeout(function () {
            args.html = "<div style='font-weight:bold'>" + ev.text() + "</div><div>Start: " + ev.start().toString("MM/dd/yyyy HH:mm") + "</div><div>End: " + ev.end().toString("MM/dd/yyyy HH:mm") + "</div><div>Id: " + ev.id() + "</div>";
            args.loaded();
        }, 500);

    }
});

// no events at startup, we will load them later using loadEvents()
dp.events.list = [];

dp.treeEnabled = true;

dp.resources = loadRooms();

function loadRooms() {
    dp.rows.load("../php/prestations.recuperation.php");
}

dp.init();