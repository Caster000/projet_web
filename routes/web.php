<?php
Route::group(['prefix' => '/'], function () {

    Route::get('/', 'GeneralController@accueil')->name('accueil');
    Route::get('cgv', 'GeneralController@cgv')->name('cgv');
    Route::get('mentions_legales', 'GeneralController@mentions_legales')->name('mentions_legales');
    Route::post('cookieConsent', 'GeneralController@cookieConsent')->name('cookieConsent');

});

Route::group(['prefix' => 'boutique'], function () {

    Route::get('/', 'BoutiqueController@index')->name('boutique');
    Route::get('/article/{numero}', 'BoutiqueController@article')->name('article');
    Route::post('/fetch', 'BoutiqueController@fetch')->name('fetch');
    Route::post('/updateArticles/{id_produit}', 'BoutiqueController@update' )->name('update');
    Route::group(['middleware' => 'auth'], function () {

        Route::group(['prefix'=>'panier'], function(){

            Route::get('/{id_produit}', 'PanierController@addToPanier');
            Route::get('/delete/{id_commande}/{id_produit}', 'PanierController@delete');
            Route::get('/{id_commande}/{id_produit}', 'PanierController@addQuantite');
            Route::get('/payment/{total}/{id_commande}','PaymentController@payWithpaypal');
            Route::get('/', 'PanierController@index')->name('panier');

        });

        Route::group(['middleware' => 'BDE'], function () {
            Route::get('/updateArticles', 'BoutiqueController@updateArticles')->name('updateArticles'); //QUE BDE
            Route::post('/', 'BoutiqueController@addArticle'); //QUE BDE
            Route::get('/delete/{id_produit}', 'BoutiqueController@delete'); //QUE BDE

        });
    });

    Route::get('/{recherche}', 'BoutiqueController@rechercher')->name('rechercher');
    Route::get('/{prix}/{categorie}', 'BoutiqueController@trierParCriteres')->name('trierParCriteres');

});

Route::group(['prefix' => 'activites'], function () {

    Route::get('/', 'ActivitesController@index')->name('activites');
    Route::get('/evenementsPasses', 'ActivitesController@evenementsPasses')->name('evenementsPasses');
    Route::get('/evenementsDuMois', 'ActivitesController@evenementsDuMois')->name('evenementsDuMois');
    Route::get('/{numero}', 'ActivitesController@activiteNumero')->where('numero','[0-9]+')->name('activite');
    Route::post('/updateActivites/{id_activite}', 'ActivitesController@update' )->name('update');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/inscription/{id_activite}', 'ActivitesController@inscription')->name('inscription');
        Route::get('/desinscription/{id_activite}', 'ActivitesController@desinscription')->name('desinscription');

        Route::group(['prefix'=>'{id_activite}'], function(){ //Regex id_activite dans RouteServiceProvider@boot

            Route::group(['middleware' => 'Inscrit'], function () {
                Route::post('/', 'PhotoController@addPhoto');
                //MIDDLEWARE POUR LES INSCRITS
                Route::get('/galerie', 'PhotoController@index');
                Route::get('/{titre}/details', 'PhotoController@image');

                Route::group(['prefix' => '{id_photo}/{id_personne}'], function () {//Regex id_personne et id_photo dans RouteServiceProvider@boot
                    Route::get('/like', 'PhotoController@addLike')->name('like');
                    Route::get('/deleteLike', 'PhotoController@deleteLike')->name('deleteLike');
                    Route::post('commentaire/', 'PhotoController@addCommentaire');
                });
            });
        });

        Route::group(['middleware' => 'Administration'], function () { //Regex id_activite dans RouteServiceProvider@boot

            Route::get('/visible/{id_activite}', 'ActivitesController@rendreVisible')->name('activiteRendreVisible');
            Route::get('/invisible/{id_activite}', 'ActivitesController@rendreInvisible')->name('activiteRendreInvisible');
            Route::get('/{id_activite}/list', 'ActivitesController@export');
            Route::get('/{id_activite}/image/list', 'PhotoController@export');

            Route::group(['prefix'=>'{id_activite}/galerie'], function() { //Regex id_activite dans RouteServiceProvider@boot
                Route::get('/visible', 'PhotoController@photoRendreVisible')->name('photoRendreVisible');
                Route::get('/invisible','PhotoController@photoRendreInvisible')->name('photoRendreInvisible');
                Route::get('/delete', 'PhotoController@deletePhoto')->name('deletePhoto');
            });

            Route::group(['prefix'=>'{id_commentaire}'], function() {//Regex id_personne et id_photo dans RouteServiceProvider@boot
                Route::get('/visible','PhotoController@commentaireRendreVisible')->name('commentaireRendreVisible');
                Route::get('/invisible','PhotoController@commentaireRendreInvisible')->name('commentaireRendreInvisible');
                Route::get('/commentaire/delete','PhotoController@deleteCommentaire')->name('deleteCommentaire');
            });

            Route::group(['middleware'=>'BDE'], function(){
                Route::get('/updateActivites', 'ActivitesController@updateActivites')->name('updateActivites'); //BDE
                Route::post('/', 'ActivitesController@addActivite')->name('addactivite'); //BDE
                Route::get('/delete/{id_activite}', 'ActivitesController@delete'); //BDE
            });

        });
    });


});

Auth::routes();

Route::get('/logout', 'HomeController@logout')->name('logout');
