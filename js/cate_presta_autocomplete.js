// autocompletion
function categorie_presta_autocomplete(id_cha) {
    // console.log(id_cha);
    var min_length = 2; // nombre de caractère avant lancement recherch 
    var keyword = $('#lib_categorie' + id_cha).val();  // cp_client fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
    var id_chambre = id_cha;
    if (keyword.length >= min_length) {
        $.ajax({
            url: '../php/categorie_presta.autocomplete.php',
            type: 'POST',
            data: {
                keyword: keyword,
                idchambre: id_cha
            },
            success: function (data) {
                $('#listecategories' + id_cha).show();
                $('#listecategories' + id_cha).html(data);
            }
        });
    } else {
        $('#listecategories' + id_cha).hide();
    }
}

// Lors du choix dans la liste
function set_item_categorie_presta(item, item2, id_cha) {
    // change input value
    $('#lib_categorie' + id_cha).val(item);
    $('#id_categorie' + id_cha).val(item2);
    // hide proposition list
    $('#listecategories' + id_cha).hide();
}