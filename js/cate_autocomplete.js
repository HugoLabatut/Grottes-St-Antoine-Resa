// autocompletion
function categorie_autocomplete() {
    var min_length = 2; // nombre de caractère avant lancement recherch 
    var keyword = $('#lib_categorie').val();  // cp_client fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
    if (keyword.length >= min_length) {
        $.ajax({
            url: '../php/categorie.autocomplete.php',
            type: 'POST',
            data: {
                keyword: keyword,
            },
            success: function (data) {
                $('#listecategories').show();
                $('#listecategories').html(data);
            }
        });
    } else {
        $('#listecategories').hide();
    }
}

// Lors du choix dans la liste
function set_item_categorie(item, item2) {
    // change input value
    $('#lib_categorie').val(item);
    $('#id_categorie').val(item2);
    // hide proposition list
    $('#listecategories').hide();
}