//require('./bootstrap');

$(document).ready(function(){

    // Ajouter une contrainte de prix
    $('#trierPrix').change(function(){
        var trierPrix = document.getElementById("trierPrix").options[document.getElementById("trierPrix").selectedIndex].value;
        var trierCategories = document.getElementById("trierCategories").options[document.getElementById("trierCategories").selectedIndex].value;

        trierCriteres(trierPrix, trierCategories);

    });

    // Ajouter une contrainte de catégorie
    $('#trierCategories').change(function(){
        var trierPrix = document.getElementById("trierPrix").options[document.getElementById("trierPrix").selectedIndex].value;
        var trierCategories = document.getElementById("trierCategories").options[document.getElementById("trierCategories").selectedIndex].value;

        trierCriteres(trierPrix, trierCategories);

    });

});

function trierCriteres(trierPrix, trierCategories){
    $.ajax({
        url: 'boutique/'+trierPrix+'/'+trierCategories,
        type: 'get',
        dataType: 'json',
        success: function(response){
            var taille = 0;
            $('#affichageArticles').empty(); // Vider la div
            if(response['data'] != null){
                taille = response['data'].length;
            }

            if(taille > 0){
                for(var i=0; i<taille; i++){
                    var id_produit = response['data'][i].id_produit;
                    var nom = response['data'][i].nom;
                    var description = response['data'][i].description;
                    var prix = response['data'][i].prix;
                    var url = response['data'][i].urlImage;

                    var resultat =
                        '<div class=\"col-sm-6 col-md-4 col-lg-3 mt-2 mb-4\">'+
                            '<div class=\"card card-inverse card-info\">'+
                                '<img class=\"card-img-top\" src=\"'+url+'\" alt=\"'+nom+'\">'+
                                '<div class=\"card-block\">'+
                                    '<h4 class=\"card-title\">'+nom+', '+prix+'€</h4>'+
                                    '<div class=\"card-text\">'+
                                        description+
                                    '</div>'+
                                '</div>'+
                            '<div class=\"card-footer text-center\">'+
                            '<a href=\"/projet_web/public/boutique/article/'+id_produit+'\" class=\"btn btn-info btn-sm\">'+
                                'Voir plus' +
                            '</a>'+
                            '</div>'+
                            '</div>'+
                        '</div>';

                    $("#affichageArticles").append(resultat);
                }
            }else {
                $("#affichageArticles").append("Aucun article à afficher !");
            }

        }
    });
}
