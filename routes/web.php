<?php

Route::get('/', function () {
    return view('accueil');
});

Route::group(['prefix'=>'boutique'], function(){

    Route::get('/', 'BoutiqueController@index')->name('boutique');
    Route::get('/article/{numero}', 'BoutiqueController@article')->name('article');
    Route::get('/panier', 'BoutiqueController@panier')->name('panier');

});

Route::group(['prefix'=>'activites'], function(){

    Route::get('/', 'ActivitesController@index')->name('activites');
    Route::get('/{numero}', 'ActivitesController@activiteNumero')->name('activite');

});

Route::group(['prefix'=>'administration'], function(){

    Route::group(['prefix'=>'boutique'], function(){

        Route::get('/', 'AdministrationController@index')->name('adminboutique');
        Route::get('/article/{numero}', 'AdministrationController@article')->name('adminarticle');

    });

    Route::group(['prefix'=>'activites'], function(){

        Route::get('/', 'AdministrationController@index')->name('adminactivites');
        Route::get('/{numero}', 'AdministrationController@activiteNumero')->name('adminactivite');

    });

});


