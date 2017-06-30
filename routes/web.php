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
    return redirect(route('login'));
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

Route::get('/home', 'HomeController@index')->name('home');  

});

Auth::routes();

Route::resource('accueil','front\\AccueilController');
Route::resource('publication','front\\PublicationsController');
Route::resource('evenement','front\\EvenementsController');
Route::resource('projet','front\\ProjetsController');

