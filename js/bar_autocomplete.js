// autocompletion
function bar_autocomplete() {
    var min_length = 2; // nombre de caractère avant lancement recherch 
    var keyword = $('#lib_bar').val();  // cp_client fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
    if (keyword.length >= min_length) {
        $.ajax({
            url: '../php/bar.autocomplete.php',
            type: 'POST',
            data: {
                keyword: keyword,
            },
            success: function (data) {
                $('#listebar').show();
                $('#listebar').html(data);
            }
        });
    } else {
        $('#listebar').hide();
    }
}

// Lors du choix dans la liste
function set_item_categorie(item, item2) {
    // change input value
    $('#lib_bar').val(item);
    $('#id_bar').val(item2);
    // hide proposition list
    $('#listebar').hide();
}