var dp = new DayPilot.Scheduler("dp");

// behavior and appearance
dp.theme = "scheduler_8";
dp.cellWidth = 40;

dp.locale = "fr-fr"

var inputNbreJours = document.getElementById('nbrejours');
var dateMini = document.getElementById('datemin');

// view
dp.startDate = DayPilot.Date.today();
dp.days = 7;
inputNbreJours.addEventListener('change', function() {
    dp.days = parseInt(inputNbreJours.value);
    dp.update();
});
function getDatesAffichage() {
    alert(dateMini.value);
    dp.startDate = dateMini.value;
    dp.update();
}
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
            args.html = "<div style='font-weight:bold'>" + ev.text() + "</div><div>Start: " + ev.start().toString("MM/dd/yyyy") + "</div><div>End: " + ev.end().toString("MM/dd/yyyy") + "</div><div>Id: " + ev.id() + "</div>";
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

function loadReservations() {
    dp.events.load("../php/resas.recuperation.php");
}

dp.onEventClick = function (args) {
    DayPilot.Modal.alert("Cliqué : " + args.e.id());
}

loadReservations();

dp.init();

