$(document).ready(function(){

    //autocomplete
    // $('#ChampsRecherche').keyup(function(){
    //     //console.log('heu');
    //     var query =$(this).val();
    //     console.log(query);
    //     if(query != ''){
    //         var _token= $('input[name="_token"]').val();
    //         $.ajax({
    //             url:'boutique/fetch',
    //             method:"POST",
    //             //dataType:'json',
    //             data:{query:query, _token:_token},
    //             success: function(response){
    //                 console.log(response)
    //                 $('#rechercheList').fadeIn();
    //                 $('#rechercheList').html(response);
    //             },
    //             error: function(xhr, status, error) {
    //                 console.log(error)
    //             }
    //         })
    //     }
    //     $(document).on('click','li', function(){
    //         $('#ChampsRecherche').val($(this).text());
    //         $('#rechercheList').fadeOut();
    //     })
    // });
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
        var recherche = document.getElementById("ChampsRecherche").value;

        rechercher(recherche);

    });

    $('#ChampsRecherche').keyup(function(){
       rechercher(this.value);
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
                '<div class=\"card-block card-size-standard\">'+
                '<h4 class=\"card-title\">'+nom+', '+prix+'€</h4>'+
                '<div class=\"hidden-scrollbar\">'+
                '<div class=\"card-text description\">'+
                description+
                '</div>'+
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

// function autocomplete(response){
//     console.log(response)
//     if(response['data'] != null){
//         taille = response['data'].length;
//     }
//
//     if(taille > 0) {
//         for (var i = 0; i < taille; i++) {
//             let nom = response['data'][i].nom;
//             // let description = response['data'][i].description;
//             // let prix = response['data'][i].prix;
//             // let url = response['data'][i].urlImage;
//             let resultat ='<ul class="dropdown-menu bg-white" style="display:block; position:relative">'+
//             '<li class="bg-white text-dark"><a href"#">'+nom+'</a></li>';
//             $('#rechercheList').empty();
//             $('#rechercheList').fadeIn();
//             //console.log(autocomplete(data));
//
//             $('#rechercheList').append(resultat);
//         }
//
//     }
// }
