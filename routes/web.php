<?php
Route::group(['prefix'=>'/'], function(){

    Route::get('/', 'GeneralController@accueil')->name('accueil');
    Route::get('cgv','GeneralController@cgv')->name('cgv');
    Route::get('mentions_legales', 'GeneralController@mentions_legales')->name('mentions_legales');
    Route::get('conditions', 'GeneralController@conditions_generales')->name('conditions');
});

Route::group(['prefix'=>'boutique'], function(){

    Route::get('/', 'BoutiqueController@index')->name('boutique');
    Route::get('/article/{numero}', 'BoutiqueController@article')->name('article');
    Route::get('/panier/{id_produit}', 'PanierController@addToPanier');
    Route::post('/', 'BoutiqueController@addArticle');
    Route::get('/panier', 'PanierController@index')->name('panier');
    Route::get('panier/delete/{id_commande}/{id_produit}', 'PanierController@delete');
    Route::get('/panier/{id_commande}/{id_produit}', 'PanierController@addQuantite');
    Route::get('/delete/{id_produit}', 'BoutiqueController@delete');

});

Route::group(['prefix'=>'activites'], function(){
    Route::get('/', 'ActivitesController@index')->name('activites');
    Route::get('/{numero}', 'ActivitesController@activiteNumero')->name('activite');

    Route::group(['middleware'=>'auth'], function(){
        Route::get('/inscription/{id_activite}', 'ActivitesController@inscription')->name('inscription');
        Route::get('/desinscription/{id_activite}', 'ActivitesController@desinscription')->name('desinscription');
        Route::post('/{numero}', 'PhotoController@addPhoto');

        Route::group(['middleware'=>'Administration'], function(){
            Route::post('/', 'ActivitesController@addActivite')->name('addactivite');
            Route::get('/delete/{id_activite}', 'ActivitesController@delete');
            Route::get('/visible/{id_activite}', 'ActivitesController@rendreVisible')->name('activiteRendreVisible');
            Route::get('/invisible/{id_activite}', 'ActivitesController@rendreInvisible')->name('activiteRendreInvisible');
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
