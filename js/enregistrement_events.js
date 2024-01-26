// Fonctions qui permettent de gérer l'affichage dynamique de l'enregistrement des réservations.

document.addEventListener('DOMContentLoaded', function () {
    // Récupération des id de chaque élément à cacher au chargement de la page
    enregistrement_formulaire = document.getElementById('formindividuel');
    information_groupe = document.getElementById('infogroupe');
    // Effacement des éléments à cacher
    enregistrement_formulaire.style.display = 'none';
    information_groupe.style.display = 'none';
});

function UI_SelectIndividuelClicked() {
    if(enregistrement_formulaire.style.display === "none") {
        enregistrement_formulaire.style.display = "block";
        information_groupe.style.display = "none";
    } else {
        enregistrement_formulaire.style.display = "none";
    }
}

function UI_SelectGroupeClicked() {
    if(information_groupe.style.display === "none") {
        information_groupe.style.display = "block";
        enregistrement_formulaire.style.display = "none";
    } else {
        information_groupe.style.display = "none";
    }
}


