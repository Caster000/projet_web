<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('accueil');
});

Route::group(['prefix'=>'boutique'], function(){

    Route::get('/', 'BoutiqueController@boutique');
    Route::get('/article/{numero}', 'BoutiqueController@article');

});

Route::group(['prefix'=>'activites'], function(){

    Route::get('/', 'ActivitesController@activites');
    Route::get('/{numero}', 'ActivitesController@activiteNumero');

});

Route::group(['prefix'=>'administration'], function(){
/*
    Route::get('/boutique', 'AdministrationController@boutique');
    Route::get('/activites', 'AdministrationController@activites');
*/
    Route::group(['prefix'=>'boutique'], function(){

        Route::get('/', 'AdministrationController@boutique');
        Route::get('/article/{numero}', 'AdministrationController@article');

    });

    Route::group(['prefix'=>'activites'], function(){

        Route::get('/', 'AdministrationController@activites');
        Route::get('/{numero}', 'AdministrationController@activiteNumero');

    });

});


