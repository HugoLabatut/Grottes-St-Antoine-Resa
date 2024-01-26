// autocompletion
function autocomplet_commune() {
    var min_length = 2; // nombre de caractère avant lancement recherch 
    var keyword = $('#cp_client').val();  // cp_client fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
    if (keyword.length >= min_length) {
        $.ajax({
            url: '../php/cp.autocomplete.php',
            type: 'POST',
            data: { keyword: keyword },
            success: function (data) {
                $('#listecommunes').show();
                $('#listecommunes').html(data);
            }
        });
    } else {
        $('#listecommunes').hide();
    }
}

// Lors du choix dans la liste
function set_item_commune(item, item2, item3) {
    // change input value
    $('#cp_client').val(item);
    $('#ville_client').val(item2);
    $('#idcommune').val(item3);
    // hide proposition list
    $('#listecommunes').hide();
}