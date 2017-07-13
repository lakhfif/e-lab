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
    return redirect(route('accueil.index'));
});



 

Route::group(['middleware' => 'auth'], function()
{
Route::resource('membres','MembresController');
Route::resource('equipes','EquipesController');
Route::resource('publications','PublicationsController');
Route::resource('cvs','CvsController');
Route::resource('projets','ProjetsControllers');
Route::resource('evenements','EvenementsController');
Route::resource('dashboard','DashboardController');
Route::resource('settings','SettingController');  
Route::resource('rapports','RapportController');
Route::get('/home', 'HomeController@index')->name('home'); 
Route::post('changePassword', [

    'uses' => 'passwordController@changePassword',
    'as' => 'changePassword'

]); 

});

Auth::routes();

Route::resource('accueil','front\\AccueilController');
Route::resource('publication','front\\PublicationsController');
Route::resource('evenement','front\\EvenementsController');
Route::resource('projet','front\\ProjetsController');
Route::resource('membre','front\\MembresController');

Route::post('search', [

    'uses' => 'front\\SearchController@getSearch',
    'as' => 'search'

]);

