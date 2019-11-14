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

    // Rechercher un article particulier
    $('#Rechercher').click(function(){
        //console.log(document.getElementById("ChampsRecherche").value);
        var recherche = document.getElementById("ChampsRecherche").value;

        rechercher(recherche);

    });

});

function trierCriteres(trierPrix, trierCategories){
    $.ajax({
        url: 'boutique/'+trierPrix+'/'+trierCategories,
        type: 'get',
        dataType: 'json',
        success: function(response){
            afficherDonnees(response);
        }
    });
}

function rechercher(recherche){
    $.ajax({
        url: 'boutique/'+recherche,
        type: 'get',
        dataType: 'json',
        success: function(response){
            afficherDonnees(response);
        }
    });
}

function afficherDonnees(response){
    let taille = 0;
    $('#affichageArticles').empty(); // Vider la div
    if(response['data'] != null){
        taille = response['data'].length;
    }

    if(taille > 0){
        for(var i=0; i<taille; i++){
            let id_produit = response['data'][i].id_produit;
            let nom = response['data'][i].nom;
            let description = response['data'][i].description;
            let prix = response['data'][i].prix;
            let url = response['data'][i].urlImage;

            let resultat =
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
