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

Route::get('send', 'mailController@send');

// start login routes
Route::get('/', [
	'as' => 'login_path',
	'uses' => 'LoginController@getForm'
]);


Route::get('/remember', [
	'as' => 'rem_path',
	'uses' => 'LoginController@getRem'
]);

Route::post('/remember', [
	'as' => 'rem_path',
	'uses' => 'LoginController@postRem'
]);

Route::get('/deconnect', [
	'as' => 'dec_path',
	'uses' => 'LoginController@deconnect'
]);
// end login routes

// start accueil routes

// end accueil routes

/*
 * Souscripteur route
 * */
//call form add
Route::get('souscripteur/add',[
	'as'=>'add_souscripteur_path',
	'uses'=>'SouscripteurController@create',
]);
//get list off souscripteur
Route::get('souscripteur/list',[
	'as'=>'souscripteur_list_path',
	'uses'=>'SouscripteurController@index',
]);
//
Route::get('souscripteur/list/download_pdf',[
	'as'=>'souscripteur_list_download_pdf',
	'uses'=>'SouscripteurController@download_pdf',
]);
//
Route::get('souscripteur/list/stream_pdf',[
	'as'=>'souscripteur_list_stream_pdf',
	'uses'=>'SouscripteurController@stream_pdf',
	'uses'=>'SouscripteurController@stream_pdf',
]);

//valide form add
Route::post('souscripteur/add',[
	'as'=>'add_souscripteur_path',
	'uses'=>'SouscripteurController@store',
]);
//show details
Route::get('souscripteur/show/{id}',[
    'as'=>'souscripteur_show_path/{id}',
    'uses'=>'SouscripteurController@show',
]);
//update view
Route::get('souscripteur/update/{id}',[
    'as'=>'souscripteur_update_path/{id}',
    'uses'=>'SouscripteurController@edit'
]);
Route::post('souscripteur/update',[
    'as'=>'souscripteur_update_path',
    'uses'=>'SouscripteurController@update'
]);
Route::get('souscripteur/delete/{id}',[
    'as'=>'souscripteur_delete_path/{id}',
    'uses'=>'SouscripteurController@destroy'
]);
Route::get('souscripteur/new/{id}',[
    'as'=>'souscripteur_new_path/{id}',
    'uses'=>'SouscripteurController@addNew'
]);
//details


//delete


//end souscripteur route
/*
 * Surccusale route
 * */
Route::get('surccusale/add',[
   'as' => 'add_surccusale_path',
   'uses' => 'SurccusaleController@create',
]);
Route::post('surccusale/add',[
   'as' => 'add_surccusale_path',
   'uses' => 'SurccusaleController@store',
]);
Route::get('surccusale/list',[
   'as' => 'list_surccusale_path',
   'uses' => 'SurccusaleController@index',
]);
Route::get('surccusale/show/{id}',[
    'as' => 'show_surccusale_path/{id}',
    'uses' => 'SurccusaleController@show',
]);
Route::post('surccusale/add/{id}',[
    'as' => 'add_surccusale_path/{id}',
    'uses' => 'SurccusaleController@getFormAdd',
]);
Route::get('surccusale/delete/{id}',[
    'as' => 'delete_surccusale_path/{id}',
    'uses' => 'SurccusaleController@destroy',
]);
Route::get('surccusale/update/{id}',[
    'as' => 'update_surccusale_path/{id}',
    'uses' => 'SurccusaleController@edit',
]);
Route::post('surccusale/update/',[
    'as' => 'update_surccusale_path',
    'uses' => 'SurccusaleController@update',
]);

/*
 * Compagnie route
 * */

Route::get('compagny/add',[
	'as'=>'compagnie_add_path',
	'uses'=>'CompagnyController@create',
]);
Route::get('compagny/list',[
	'as'=>'compagnie_list_path',
	'uses'=>'CompagnyController@index',
]);
Route::get('compagny/show/{id}',[
	'as'=>'compagnie_show_path/{id}',
	'uses'=>'CompagnyController@show',
]);
Route::get('compagny/update/{id}',[
	'as'=>'compagnie_show_path/{id}',
	'uses'=>'CompagnyController@edit',
]);
Route::get('compagny/delete/{id}',[
	'as'=>'compagnie_delete_path/{id}',
	'uses'=>'CompagnyController@destroy',
]);
Route::post('compagny/update/',[
	'as'=>'compagnie_update_path',
	'uses'=>'CompagnyController@update',
]);
Route::post('compagny/add',[
	'as'=>'compagnie_add_path',
	'uses'=>'CompagnyController@store',
]);

/*
 * Exercice route
 * */

//add route
Route::get('exercice/add',[
	'as' => 'add_exercice_path',
	'uses' => 'ExerciceController@create'
]);
Route::post('exercice/add',[
	'as' => 'add_exercice_path',
	'uses' => 'ExerciceController@store'
]);

Route::get('exercice/list',[
	'as'=>'list_exercice_path',
	'uses'=>'ExerciceController@index'
]);
Route::post('exercice/lock',[
	'as'=>'cloture_excercice_path',
	'uses'=>'ExerciceController@cloture'
]);
Route::get('exercice/show/{id}',[
	'as'=>'show_excercice_path/{id}',
	'uses'=>'ExerciceController@show'
]);

/*
 * Assur� & incorporation route
 */
Route::get('assure/list',[
    'as' => 'list_assure_path',
    'uses' =>'AssureController@index'
]);
Route::get('assure/add',[
    'as' => 'add_assure_path',
    'uses' =>'AssureController@create'
]);
Route::get('assure/show/{id}',[
    'as' => 'show_assure_path/{id}',
    'uses' =>'AssureController@show'
]);

Route::get('assure/{id}/print',[
    'as' => 'assure.print',
    'uses' =>'AssureController@printer'
]);

Route::get('assure/update/{id}',[
    'as' => 'update_assure_path/{id}',
    'uses' =>'AssureController@edit'
]);
Route::get('assure/delete/{id}',[
    'as' => 'delete_assure_path/{id}',
    'uses' =>'AssureController@destroy'
]);
Route::post('assure/add',[
    'as' => 'add_assure_path',
    'uses' =>'AssureController@store'
]);
Route::post('assure/update',[
    'as' => 'update_assure_path',
    'uses' =>'AssureController@update'
]);

//incorporation routes
Route::get('assure/incorporation',[
    'as' => 'incorporation_assure_path',
    'uses' =>'IncorporationController@index'
]);

Route::get('incorporate/show/{id}',[
    'as' => 'show_incorporate_path/{id}',
    'uses' =>'IncorporationController@show'
]);
Route::get('incorporate/edit/{id}',[
    'as' => 'edit_incorporate_path/{id}',
    'uses' =>'IncorporationController@edit'
]);
Route::post('incorporate/update',[
    'as' => 'update_incorporate_path',
    'uses' =>'IncorporationController@update'
]);
Route::post('incorporate/uptodate',[
    'as' => 'uptodate_incorporate_path',
    'uses' =>'IncorporationController@upToDate'
]);

Route::get('incorporate/delete/{id}',[
    'as' => 'delete_incorporate_path/{id}',
    'uses' =>'IncorporationController@destroy'
]);
Route::post('incorporation/add',[
    'as' => 'add_incorpore_path',
    'uses' =>'IncorporationController@store'
]);


/*
 * Police Routes
 */
Route::get('police/add',[
    'as' => 'add_police_path',
    'uses' => 'PoliceController@create'
]);
Route::post('police/add',[
    'as' => 'add_police_path',
    'uses' => 'PoliceController@store'
]);
Route::get('police/list',[
    'as' => 'list_police_path',
    'uses' => 'PoliceController@index'
]);
Route::get('police/update/{id}',[
    'as' => 'update_police_path/{id}',
    'uses' => 'PoliceController@edit'
]);
Route::get('police/delete/{id}',[
    'as' => 'delete_police_path/{id}',
    'uses' => 'PoliceController@delete'
]);
Route::get('police/show/{id}',[
    'as' => 'show_police_path/{id}',
    'uses' => 'PoliceController@show'
]);
Route::post('police/update/',[
    'as' => 'update_police_path',
    'uses' => 'PoliceController@update'
]);

/*
 * Prestataire Route
 */
Route::get('centre-sante/list',[
    'as' => 'list_prestataire_path',
    'uses' => 'CentreSanteController@index'
]);
Route::get('centre-sante/add',[
    'as' => 'add_prestataire_path',
    'uses' => 'CentreSanteController@create'
]);
Route::get('centre-sante/edit/{id}',[
    'as' => 'edit_prestataire_path',
    'uses' => 'CentreSanteController@edit'
]);
Route::get('centre-sante/delete/{id}',[
    'as' => 'delete_prestataire_path',
    'uses' => 'CentreSanteController@destroy'
]);
Route::get('centre-sante/show/{id}',[
    'as' => 'show_prestataire_path/{id}',
    'uses' => 'CentreSanteController@show'
]);
Route::post('centre-sante/update',[
    'as' => 'update_prestataire_path',
    'uses' => 'CentreSanteController@update'
]);
Route::post('centre-sante/add',[
    'as' => 'add_prestataire_path',
    'uses' => 'CentreSanteController@store'
]);
/*
 * Bpc Routes
 */
Route::get('bpc/add',[
    'as' => 'add_bpc_path',
    'uses' => 'BpcController@create'
]);

Route::post('bpc/add',[
   'as'=>'add_bpc_path',
   'uses'=>'BpcController@store'
]);
Route::get('bpc/list',[
   'as'=>'list_bpc_path',
   'uses'=>'BpcController@index'
]);
Route::get('bpc/show/{id}',[
   'as' => 'show_bpc_path/{id}',
   'uses' => 'BpcController@show'
]);

Route::get('bpc/{id}/print',[
   'as' => 'bpc.print',
   'uses' => 'BpcController@printer'
]);
Route::get('bpc/update/{id}',[
   'as' => 'update_bpc_path/{id}',
   'uses' => 'BpcController@edit'
]);
Route::get('bpc/delete/{id}',[
   'as' => 'delete_bpc_path/{id}',
   'uses' => 'BpcController@destroy'
]);

/*
 * Decompte Route
 */
Route::get('decompte/add',[
   'as'=>'add_decompte_path',
   'uses'=>'DecompteController@create'
]);
Route::get('decompte/print',[
   'as'=>'decompte.print',
   'uses'=>'DecompteController@printer'
]);
Route::post('decompte/add',[
   'as'=>'add_decompte_path',
   'uses'=>'DecompteController@store'
]);
Route::post('decompte/second/add',[
   'as'=>'add_bpc_second_path',
   'uses'=>'DecompteController@storeIn'
]);
Route::get('decompte/list',[
   'as'=>'list_decompte_path',
   'uses'=>'DecompteController@index'
]);
Route::post('decompte/delete/presta',[
   'as'=>'delete_presta_path',
   'uses'=>'DecompteController@delete'
]);


/*
 * Remboursement Route
 */
Route::get('remboursement/validation',[
    'as'=>'add_remboursement_path',
    'uses'=>'RemboursementController@create'
]);

Route::get('remboursement/print',[
    'as'=>'remboursement.print',
    'uses'=>'RemboursementController@printer'
]);
Route::get('remboursement/list',[
    'as'=>'list_remboursement_path',
    'uses'=>'RemboursementController@index'
]);
Route::post('remboursement/add',[
    'as'=>'store_remboursement_path',
    'uses'=>'RemboursementController@store'
]);
/*
 * Remboursement Route
 */
Route::get('bonus/validation',[
    'as'=>'add_bonus_path',
    'uses'=>'BonusMalusController@create'
]);
Route::get('bonus/list',[
    'as'=>'list_bonus_path',
    'uses'=>'BonusMalusController@index'
]);
Route::post('bonus/add',[
    'as'=>'store_bonus_path',
    'uses'=>'BonusMalusController@store'
]);
/*
// start utilisateur routes
Route::get('/utilisateur', [
	'as' => 'user_path',
	'uses' => 'UserController@getForm'
]);


Route::post('/utilisateur', [
	'as' => 'user_path',
	'uses' => 'UserController@postForm'
]);*/
// end utilisateur routes


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [
    'as' => 'accueil_path',
    'uses' => 'AccueilController@index'
]);


Route::get('/backup/db', [
    'as' => 'sauvegarde.bd',
    'uses' => 'BackupController@save_bd'
]);
Route::post('/backup/db', [
    'as' => 'sauvegarde.bd.create',
    'uses' => 'BackupController@create_bd_backup'
]);