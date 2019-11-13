<?php
Route::group(['prefix' => '/'], function () {

    Route::get('/', 'GeneralController@accueil')->name('accueil');
    Route::get('cgv', 'GeneralController@cgv')->name('cgv');
    Route::get('mentions_legales', 'GeneralController@mentions_legales')->name('mentions_legales');
    Route::get('conditions', 'GeneralController@conditions_generales')->name('conditions');
    Route::post('cookieConsent', 'GeneralController@cookieConsent')->name('cookieConsent');
});

Route::group(['prefix' => 'boutique'], function () {

    Route::get('/', 'BoutiqueController@index')->name('boutique');
    Route::get('/article/{numero}', 'BoutiqueController@article')->name('article');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/panier/{id_produit}', 'PanierController@addToPanier');
        Route::get('panier/delete/{id_commande}/{id_produit}', 'PanierController@delete');
        Route::get('/panier/{id_commande}/{id_produit}', 'PanierController@addQuantite');
        Route::get('/panier', 'PanierController@index')->name('panier');
        Route::group(['middleware' => 'Administration'], function () {
            Route::get('/updateArticles', 'BoutiqueController@updateArticles')->name('updateArticles');
            Route::post('/', 'BoutiqueController@addArticle');
            Route::get('/delete/{id_produit}', 'BoutiqueController@delete');
        });
    });


});

Route::group(['prefix' => 'activites'], function () {
    Route::get('/', 'ActivitesController@index')->name('activites');
    Route::get('/evenementsPasses', 'ActivitesController@evenementsPasses')->name('evenementsPasses');
    Route::get('/evenementsDuMois', 'ActivitesController@evenementsDuMois')->name('evenementsDuMois');
    Route::get('/{numero}', 'ActivitesController@activiteNumero')->where('numero','[0-9]+')->name('activite');


    Route::group(['middleware' => 'auth'], function () {
        Route::get('/inscription/{id_activite}', 'ActivitesController@inscription')->name('inscription');
        Route::get('/desinscription/{id_activite}', 'ActivitesController@desinscription')->name('desinscription');
        Route::post('/{id_activite}', 'PhotoController@addPhoto');
        Route::get('/{id_activite}/galerie','PhotoController@index');
        Route::get('/{id_activite}/galerie/visible', 'PhotoController@photoRendreVisible')->name('photoRendreVisible');
        Route::get('/{id_activite}/galerie/invisible','PhotoController@photoRendreInvisible')->name('photoRendreInvisible');
        Route::get('/{id_activite}/galerie/delete', 'PhotoController@deletePhoto')->name('deletePhoto');
        Route::get('/{id_activite}/{titre}/d','PhotoController@image');
        Route::get('/{id_photo}/{id_personne}','PhotoController@addLike');
        Route::get('/{id_photo}/{id_personne}/delete','PhotoController@deleteLike');
        Route::post('/{id_photo}/{id_personne}/comment','PhotoController@addCommentaire');


        Route::group(['middleware' => 'Administration'], function () {
            Route::post('/', 'ActivitesController@addActivite')->name('addactivite');
            Route::get('/delete/{id_activite}', 'ActivitesController@delete');
            Route::get('/visible/{id_activite}', 'ActivitesController@rendreVisible')->name('activiteRendreVisible');
            Route::get('/invisible/{id_activite}', 'ActivitesController@rendreInvisible')->name('activiteRendreInvisible');
            Route::get('/updateActivites', 'ActivitesController@updateActivites')->name('updateActivites');
            Route::get('/{id_activite}/list', 'ActivitesController@export');


        });
    });


});
/*
Route::group(['prefix'=>'administration'], function(){

    Route::group(['prefix'=>'boutique'], function(){

        Route::get('/', 'AdministrationController@index')->name('adminboutique');
        Route::get('/article/{numero}', 'AdministrationController@article')->name('adminarticle');

    });

    Route::group(['prefix'=>'activites'], function(){

        Route::get('/', 'AdministrationController@index')->name('adminactivites');
        Route::get('/{numero}', 'AdministrationController@activiteNumero')->name('adminactivite');

    });

});*/


Auth::routes();

Route::get('/logout', 'HomeController@logout')->name('logout');
