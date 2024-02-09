// Fonctions qui permettent de gérer l'affichage dynamique de l'enregistrement des réservations.

document.addEventListener('DOMContentLoaded', function () {
    // Récupération des id de chaque élément à cacher au chargement de la page
    enregistrement_formulaire = document.getElementById('formindividuel');
    information_groupe = document.getElementById('infogroupe');
    dates_choix = document.getElementById('choixdate');
    categories_choix = document.getElementById('choixcategorie');
    // Effacement des éléments à cacher
    enregistrement_formulaire.style.display = 'none';
    information_groupe.style.display = 'none';
    dates_choix.style.display = 'none';
    categories_choix.style.display = 'none';
});

function UI_SelectIndividuelClicked() {
    if (dates_choix.style.display === "none") {
        dates_choix.style.display = "block";
        information_groupe.style.display = "none";
    } else {
        dates_choix.style.display = "none";
    }
}

function UI_ConfirmDateResa(event) {
    event.preventDefault();
    if (categories_choix.style.display === "none") {
        categories_choix.style.display = "block";
    }
}

function UI_SelectGroupeClicked() {
    if (information_groupe.style.display === "none") {
        information_groupe.style.display = "block";
        dates_choix.style.display = "none";
    } else {
        information_groupe.style.display = "none";
    }
}


