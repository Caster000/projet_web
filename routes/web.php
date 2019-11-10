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



Auth::routes();

Route::get('/logout', 'HomeController@logout')->name('logout');
