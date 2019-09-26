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

Auth::routes();
Route::get('send', 'mailController@send');

// start login routes
Route::get('/', [
	'uses' => 'AccueilController@index'
]);
Route::post('login', [
	'as' => 'login_path',
	'uses' => 'LoginController@login'
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
	'uses' => 'LoginController@logout'
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
    'middleware' => 'admin',

]);
//get list off souscripteur
Route::get('souscripteur/list',[
	'as'=>'souscripteur_list_path',
	'uses'=>'SouscripteurController@index',
    'middleware' => 'admin',
]);
//print
Route::get('souscripteur/list/download_pdf',[
    'as'=>'souscripteur_list_download_pdf',
    'uses'=>'SouscripteurController@download_pdf',
    'middleware' => 'admin',
]);
//
Route::get('souscripteur/list/stream_pdf',[
    'as'=>'souscripteur_list_stream_pdf',
    'uses'=>'SouscripteurController@stream_pdf',
    'middleware' => 'admin',
]);
//valide form add
Route::post('souscripteur/add',[
	'as'=>'add_souscripteur_path',
	'uses'=>'SouscripteurController@store',
    'middleware' => 'admin',
]);
//show details
Route::get('souscripteur/show/{id}',[
    'as'=>'souscripteur_show_path/{id}',
    'uses'=>'SouscripteurController@show',
    'middleware' => 'admin',
]);
//update view
Route::get('souscripteur/update/{id}',[
    'as'=>'souscripteur_update_path/{id}',
    'uses'=>'SouscripteurController@edit',
    'middleware' => 'admin',
]);
Route::post('souscripteur/update',[
    'as'=>'souscripteur_update_path',
    'uses'=>'SouscripteurController@update',
    'middleware' => 'admin',
]);
Route::get('souscripteur/delete/{id}',[
    'as'=>'souscripteur_delete_path/{id}',
    'uses'=>'SouscripteurController@destroy',
    'middleware' => 'admin',
]);
Route::get('souscripteur/new/{id}',[
    'as'=>'souscripteur_new_path/{id}',
    'uses'=>'SouscripteurController@addNew',
    'middleware' => 'admin',
]);
Route::get('souscripteur/print/all',[
    'as'=>'souscripteur_print_all',
    'uses'=>'SouscripteurController@printAll',
    'middleware' => 'admin',
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
    'middleware' => 'admin',
]);
Route::post('surccusale/add',[
   'as' => 'add_surccusale_path',
   'uses' => 'SurccusaleController@store',
    'middleware' => 'admin',
]);
Route::get('surccusale/list',[
   'as' => 'list_surccusale_path',
   'uses' => 'SurccusaleController@index',
    'middleware' => 'admin',
]);
Route::get('surccusale/show/{id}',[
    'as' => 'show_surccusale_path/{id}',
    'uses' => 'SurccusaleController@show',
    'middleware' => 'admin',
]);
Route::post('surccusale/add/{id}',[
    'as' => 'add_surccusale_path/{id}',
    'uses' => 'SurccusaleController@getFormAdd',
    'middleware' => 'admin',
]);
Route::get('surccusale/delete/{id}',[
    'as' => 'delete_surccusale_path/{id}',
    'uses' => 'SurccusaleController@destroy',
    'middleware' => 'admin',
]);
Route::get('surccusale/update/{id}',[
    'as' => 'update_surccusale_path/{id}',
    'uses' => 'SurccusaleController@edit',
    'middleware' => 'admin',
]);
Route::post('surccusale/update/',[
    'as' => 'update_surccusale_path',
    'uses' => 'SurccusaleController@update',
    'middleware' => 'admin',
]);

Route::get('surccusale/print/all',[
    'as' => 'succursale_print_all',
    'uses' => 'SurccusaleController@printAll',
    'middleware' => 'admin'
]);
/*
 * Compagnie route
 * */

Route::get('compagny/add',[
	'as'=>'compagnie_add_path',
	'uses'=>'CompagnyController@create',
    'middleware' => 'admin',
]);
Route::get('compagny/list',[
	'as'=>'compagnie_list_path',
	'uses'=>'CompagnyController@index',
    'middleware' => 'admin',
]);
Route::get('compagny/show/{id}',[
	'as'=>'compagnie_show_path/{id}',
	'uses'=>'CompagnyController@show',
    'middleware' => 'admin',
]);
Route::get('compagny/update/{id}',[
	'as'=>'compagnie_show_path/{id}',
	'uses'=>'CompagnyController@edit',
    'middleware' => 'admin',
]);
Route::get('compagny/delete/{id}',[
	'as'=>'compagnie_delete_path/{id}',
	'uses'=>'CompagnyController@destroy',
    'middleware' => 'admin',
]);
Route::post('compagny/update/',[
	'as'=>'compagnie_update_path',
	'uses'=>'CompagnyController@update',
    'middleware' => 'admin',
]);
Route::post('compagny/add',[
	'as'=>'compagnie_add_path',
	'uses'=>'CompagnyController@store',
    'middleware' => 'admin',
]);
Route::get('compagny/print/all',[
    'as'=>'compagnie_print_path',
    'uses'=>'CompagnyController@printAll',
    'middleware' => 'admin',
]);
/*
 * categorie assure route
 * */

Route::get('categorie-assure/add',[
	'as'=>'add_categorie_assure_path',
	'uses'=>'CategorieAssureController@create',
    'middleware' => 'admin',
]);
Route::get('categorie-assure/list',[
	'as'=>'compagnie_assure_list_path',
	'uses'=>'CategorieAssureController@index',
    'middleware' => 'admin',
]);
Route::get('categorie-assure/show/{id}',[
	'as'=>'compagnie_show_path/{id}',
	'uses'=>'CategorieAssureController@show',
    'middleware' => 'admin',
]);
Route::get('categorie-assure/update/{id}',[
	'as'=>'compagnie_edit_path/{id}',
	'uses'=>'CategorieAssureController@edit',
    'middleware' => 'admin',
]);
Route::get('categorie-assure/delete/{id}',[
	'as'=>'compagnie_delete_path/{id}',
	'uses'=>'CategorieAssureController@destroy',
    'middleware' => 'admin',
]);
Route::post('categorie-assure/update/',[
	'as'=>'compagnie_update_path',
	'uses'=>'CategorieAssureController@update',
    'middleware' => 'admin',
]);
Route::post('categorie-assure/add',[
	'as'=>'add_categorie_assure_path',
	'uses'=>'CategorieAssureController@store',
    'middleware' => 'admin',
]);

/*
 * Exercice route
 * */

//add route
Route::get('exercice/add',[
	'as' => 'add_exercice_path',
	'uses' => 'ExerciceController@create',
    'middleware' => 'admin',
]);
Route::post('exercice/add',[
	'as' => 'add_exercice_path',
	'uses' => 'ExerciceController@store',
    'middleware' => 'admin',
]);

Route::get('exercice/list',[
	'as'=>'list_exercice_path',
	'uses'=>'ExerciceController@index',
    'middleware' => 'admin',
]);
Route::post('exercice/lock',[
	'as'=>'cloture_excercice_path',
	'uses'=>'ExerciceController@cloture',
    'middleware' => 'admin',
]);
Route::get('exercice/show/{id}',[
	'as'=>'show_excercice_path/{id}',
	'uses'=>'ExerciceController@show',
    'middleware' => 'admin',
]);
Route::get('exercice/succursale/{id}',[
	'as'=>'succursale_excercice_path/{id}',
	'uses'=>'ExerciceController@getSuccursale',
    'middleware' => 'admin',
]);
Route::get('exercice/assure/{id}',[
	'as'=>'assure_excercice_path/{id}',
	'uses'=>'ExerciceController@getAssure',
    'middleware' => 'admin',
]);
Route::get('exercice/incorporate/{id}',[
	'as'=>'incorporate_excercice_path/{id}',
	'uses'=>'ExerciceController@getIncorporate',
    'middleware' => 'admin',
]);
Route::get('exercice/bpc/{id}',[
	'as'=>'bpc_excercice_path/{id}',
	'uses'=>'ExerciceController@getBpc',
    'middleware' => 'admin',
]);
Route::get('exercice/decompte/{id}',[
	'as'=>'decompte_excercice_path/{id}',
	'uses'=>'ExerciceController@getDecompte',
    'middleware' => 'admin',
]);
Route::get('exercice/remboursement/{id}',[
	'as'=>'remboursement_excercice_path/{id}',
	'uses'=>'ExerciceController@getRemboursement',
    'middleware' => 'admin',
]);

/*
 * Assur� & incorporation route
 */
Route::get('assure/list',[
    'as' => 'list_assure_path',
    'uses' =>'AssureController@index',
    'middleware' => 'admin',
]);
Route::get('assure/add',[
    'as' => 'add_assure_path',
    'uses' =>'AssureController@create',
    'middleware' => 'admin',
]);
Route::get('assure/show/{id}',[
    'as' => 'show_assure_path/{id}',
    'uses' =>'AssureController@show',
    'middleware' => 'admin',
]);
Route::get('assure/{id}/print',[
    'as' => 'assure.print',
    'uses' =>'AssureController@printer',
    'middleware' => 'admin',
]);
Route::get('assure/update/{id}',[
    'as' => 'update_assure_path/{id}',
    'uses' =>'AssureController@edit',
    'middleware' => 'admin',
]);
Route::get('assure/delete/{id}',[
    'as' => 'delete_assure_path/{id}',
    'uses' =>'AssureController@destroy',
    'middleware' => 'admin',
]);
Route::post('assure/add',[
    'as' => 'add_assure_path',
    'uses' =>'AssureController@store',
    'middleware' => 'admin',
]);
Route::post('assure/update',[
    'as' => 'update_assure_path',
    'uses' =>'AssureController@update',
    'middleware' => 'admin',
]);
Route::get('assure/print/all',[
    'as' => 'print_assure_path',
    'uses' =>'AssureController@printAll',
    'middleware' => 'admin',
]);
Route::get('assure/print/',[
    'as' => 'print_assure_path_exercice',
    'uses' =>'AssureController@printByExercice',
    'middleware' => 'admin',
]);

//incorporation routes
Route::get('assure/incorporation',[
    'as' => 'incorporation_assure_path',
    'uses' =>'IncorporationController@index',
    'middleware' => 'admin',
]);

Route::get('incorporate/show/{id}',[
    'as' => 'show_incorporate_path/{id}',
    'uses' =>'IncorporationController@show',
    'middleware' => 'admin',
]);
Route::get('incorporate/edit/{id}',[
    'as' => 'edit_incorporate_path/{id}',
    'uses' =>'IncorporationController@edit',
    'middleware' => 'admin',
]);
Route::post('incorporate/update',[
    'as' => 'update_incorporate_path',
    'uses' =>'IncorporationController@update',
    'middleware' => 'admin',
]);
Route::post('incorporate/uptodate',[
    'as' => 'uptodate_incorporate_path',
    'middleware' => 'admin',
    'uses' =>'IncorporationController@upToDate'
]);

Route::get('incorporate/delete/{id}',[
    'as' => 'delete_incorporate_path/{id}',
    'middleware' => 'admin',
    'uses' =>'IncorporationController@destroy'
]);
Route::post('incorporation/add',[
    'as' => 'add_incorpore_path',
    'middleware' => 'admin',
    'uses' =>'IncorporationController@store'
]);


/*
 * Police Routes
 */
Route::get('police/add',[
    'as' => 'add_police_path',
    'middleware' => 'admin',
    'uses' => 'PoliceController@create'
]);
Route::post('police/add',[
    'as' => 'add_police_path',
    'middleware' => 'admin',
    'uses' => 'PoliceController@store'
]);
Route::get('police/list',[
    'as' => 'list_police_path',
    'middleware' => 'admin',
    'uses' => 'PoliceController@index'
]);
Route::get('police/update/{id}',[
    'as' => 'update_police_path/{id}',
    'middleware' => 'admin',
    'uses' => 'PoliceController@edit'
]);
Route::get('police/delete/{id}',[
    'as' => 'delete_police_path/{id}',
    'middleware' => 'admin',
    'uses' => 'PoliceController@delete'
]);
Route::get('police/show/{id}',[
    'as' => 'show_police_path/{id}',
    'middleware' => 'admin',
    'uses' => 'PoliceController@show'
]);
Route::post('police/update/',[
    'as' => 'update_police_path',
    'middleware' => 'admin',
    'uses' => 'PoliceController@update'
]);
Route::get('police/print',[
    'as' => 'print_police_path',
    'middleware' => 'admin',
    'uses' => 'PoliceController@printAll'
]);
/*
 * Prestataire Route
 */
Route::get('centre-sante/list',[
    'as' => 'list_prestataire_path',
    'middleware' => 'admin',
    'uses' => 'CentreSanteController@index'
]);
Route::get('centre-sante/add',[
    'as' => 'add_prestataire_path',
    'middleware' => 'admin',
    'uses' => 'CentreSanteController@create'
]);
Route::get('centre-sante/edit/{id}',[
    'as' => 'edit_prestataire_path',
    'middleware' => 'admin',
    'uses' => 'CentreSanteController@edit'
]);
Route::get('centre-sante/delete/{id}',[
    'as' => 'delete_prestataire_path',
    'middleware' => 'admin',
    'uses' => 'CentreSanteController@destroy'
]);
Route::get('centre-sante/show/{id}',[
    'as' => 'show_prestataire_path/{id}',
    'middleware' => 'admin',
    'uses' => 'CentreSanteController@show'
]);
Route::post('centre-sante/update',[
    'as' => 'update_prestataire_path',
    'middleware' => 'admin',
    'uses' => 'CentreSanteController@update'
]);
Route::post('centre-sante/add',[
    'as' => 'add_prestataire_path',
    'middleware' => 'admin',
    'uses' => 'CentreSanteController@store'
]);
/*
 * Bpc Routes
 */
Route::get('bpc/add',[
    'as' => 'add_bpc_path',
    'middleware' => 'admin',
    'uses' => 'BpcController@create'
]);

Route::post('bpc/add',[
   'as'=>'add_bpc_path',
   'uses'=>'BpcController@store',
    'middleware' => 'admin',
]);
Route::get('bpc/list',[
   'as'=>'list_bpc_path',
    'middleware' => 'admin',
   'uses'=>'BpcController@index'
]);
Route::get('bpc/show/{id}',[
   'as' => 'show_bpc_path/{id}',
    'middleware' => 'admin',
   'uses' => 'BpcController@show'
]);
Route::get('bpc/{id}/print',[
    'as' => 'bpc.print',
    'middleware' => 'admin',
    'uses' => 'BpcController@printer'
]);
Route::get('bpc/print',[
    'as' => 'bpc_print_path',
    'middleware' => 'admin',
    'uses' => 'BpcController@printerPdf'
]);
Route::get('bpc/update/{id}',[
   'as' => 'update_bpc_path/{id}',
    'middleware' => 'admin',
   'uses' => 'BpcController@edit'
]);
Route::get('bpc/delete/{id}',[
   'as' => 'delete_bpc_path/{id}',
    'middleware' => 'admin',
   'uses' => 'BpcController@destroy'
]);

Route::get('bpc/print',[
    'as' => 'print_bpc_path',
    'middleware' => 'admin',
    'uses' => 'BpcController@printe'
]);

Route::post('bpc-print/',[
    'as' => 'print-bpc-path',
    'middleware' => 'admin',
    'uses' => 'BpcController@printBpc'
]);

/*
 * Decompte Route
 */
Route::get('decompte/add',[
   'as'=>'add_decompte_path',
    'middleware' => 'admin',
   'uses'=>'DecompteController@create'
]);
Route::post('decompte/add',[
   'as'=>'add_decompte_path',
    'middleware' => 'admin',
   'uses'=>'DecompteController@store'
]);
Route::get('decompte/{id}/print',[
    'as'=>'decompte.print',
    'middleware' => 'admin',
    'uses'=>'DecompteController@printer'
]);
Route::post('decompte/second/add',[
   'as'=>'add_bpc_second_path',
    'middleware' => 'admin',
   'uses'=>'DecompteController@storeIn'
]);
Route::get('decompte/list',[
   'as'=>'list_decompte_path',
    'middleware' => 'admin',
   'uses'=>'DecompteController@index'
]);
Route::post('decompte/delete/presta',[
   'as'=>'delete_presta_path',
    'middleware' => 'admin',
   'uses'=>'DecompteController@delete'
]);
Route::post('decompte/delete/presta',[
    'as'=>'delete_presta_path',
    'middleware' => 'admin',
    'uses'=>'DecompteController@delete'
]);
Route::get('decompte/show/{id}',[
    'as' => 'show_decompte_path/{id}',
    'middleware' => 'admin',
    'uses' => 'DecompteController@show'
]);

/*
 * Remboursement Route
 */
Route::get('remboursement/validation',[
    'as'=>'add_remboursement_path',
    'middleware' => 'admin',
    'uses'=>'RemboursementController@create'
]);
Route::get('remboursement/print',[
    'as'=>'remboursement.print',
    'middleware' => 'admin',
    'uses'=>'RemboursementController@printer'
]);
Route::get('remboursement/list',[
    'as'=>'list_remboursement_path',
    'middleware' => 'admin',
    'uses'=>'RemboursementController@index'
]);
Route::post('remboursement/add',[
    'as'=>'store_remboursement_path',
    'middleware' => 'admin',
    'uses'=>'RemboursementController@store'
]);
/*
 * Remboursement Route
 */
Route::get('bonus/validation',[
    'as'=>'add_bonus_path',
    'middleware' => 'admin',
    'uses'=>'BonusMalusController@create'
]);
Route::get('bonus/list',[
    'as'=>'list_bonus_path',
    'middleware' => 'admin',
    'uses'=>'BonusMalusController@index'
]);
Route::post('bonus/add',[
    'as'=>'store_bonus_path',
    'middleware' => 'admin',
    'uses'=>'BonusMalusController@store'
]);

/*
 * Tarif routes
 */
Route::get('tarif/prestation/add',[
   'as' => 'add_prestation_path',
    'middleware' => 'admin',
   'uses' => 'TarifController@addPrestation'
]);
Route::get('tarif/bareme/add',[
   'as' => 'add_bareme_path',
    'middleware' => 'admin',
   'uses' => 'TarifController@addbareme'
]);
Route::get('tarif/categorie/add',[
   'as' => 'add_cate_presta_path',
    'middleware' => 'admin',
   'uses' => 'TarifController@addCategorie'
]);
Route::get('tarif/categorie/all',[
   'as' => 'all_categorie_path',
    'middleware' => 'admin',
   'uses' => 'TarifController@getCategorie'
]);
Route::get('tarif/prestation/all',[
   'as' => 'all_prestation_path',
    'middleware' => 'admin',
   'uses' => 'TarifController@getPrestation'
]);
Route::get('tarif/bareme/all',[
   'as' => 'all_bareme_path',
    'middleware' => 'admin',
   'uses' => 'TarifController@getBareme'
]);
Route::get('tarif/bareme/edit/{id}',[
   'as' => 'edit_bareme_path/{id}',
    'middleware' => 'admin',
   'uses' => 'TarifController@editBareme'
]);
Route::get('tarif/prestation/edit/{id}',[
   'as' => 'edit_prestation_path/{id}',
    'middleware' => 'admin',
   'uses' => 'TarifController@editPrestation'
]);
Route::get('tarif/categorie/edit/{id}',[
   'as' => 'edit_categorie_path/{id}',
    'middleware' => 'admin',
   'uses' => 'TarifController@editCategorie'
]);
Route::post('tarif/prestation/add',[
   'as' => 'add_prestation_path',
    'middleware' => 'admin',
   'uses' => 'TarifController@storePrestation'
]);
Route::post('tarif/bareme/add',[
    'as' => 'add_bareme_path',
    'middleware' => 'admin',
   'uses' => 'TarifController@storeBareme'
]);
Route::post('tarif/categorie/add',[
    'as' => 'add_cate_presta_path',
    'middleware' => 'admin',
   'uses' => 'TarifController@storeCategorie'
]);
Route::post('tarif/categorie/update',[
    'as' => 'tarif_categorie_update_path',
    'middleware' => 'admin',
   'uses' => 'TarifController@updateCategorie'
]);
Route::post('tarif/prestation/update',[
    'as' => 'tarif_prestation_update_path',
    'middleware' => 'admin',
   'uses' => 'TarifController@updatePrestation'
]);
Route::post('tarif/bareme/update',[
    'as' => 'tarif_bareme_update_path',
    'middleware' => 'admin',
   'uses' => 'TarifController@updateBareme'
]);
Route::get('tarif/categorie/delete/{id}',[
    'as' => 'delete_categorie_path/{id}',
    'middleware' => 'admin',
    'uses' => 'TarifController@deleteCategorie'
]);
Route::get('tarif/prestation/delete/{id}',[
    'as' => 'delete_prestation_path/{id}',
    'middleware' => 'admin',
    'uses' => 'TarifController@deletePrestation'
]);
Route::get('tarif/bareme/delete/{id}',[
    'as' => 'delete_bareme_path/{id}',
    'middleware' => 'admin',
    'uses' => 'TarifController@deleteBareme'
]);

//end remboursement route
/*
 * Statistique Road
 * */
Route::get('statistiques/assure',[
    'as' => 'stat_assure_path',
    'uses' => 'StatistiqueController@getAssure',
    'middleware' => 'admin'
]);

/**
 * route for Proposition  automobile
 */
Route::get('proposition/categorie/automobile/add',[
    'as' => 'auto_add_path',
    'uses' => 'AutomobileController@create',
    'middleware' => 'admin'
]);
Route::get('proposition/categorie/automobile/',[
    'as' => 'auto_list_path',
    'uses' => 'AutomobileController@index',
    'middleware' => 'admin'
]);

Route::post('proposition/categorie/automobile/add',[
    'as' => 'auto_add_path',
    'uses' => 'AutomobileController@store',
    'middleware' => 'admin'
]);

Route::get('proposiion/categorie/automobile/print',[
   'as' => 'auto_print_path',
    'uses' => 'AutomobileController@printer',
    'middleware' => 'admin'
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




//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [
    'as' => 'accueil_path',
    'middleware' => 'admin',
    'uses' => 'HomeController@index'
]);

Route::get('/backup/db', [
    'as' => 'sauvegarde.bd',
    'middleware' => 'admin',
    'uses' => 'BackupController@save_bd'
]);
Route::post('/backup/db', [
    'as' => 'sauvegarde.bd.create',
    'middleware' => 'admin',
    'uses' => 'BackupController@create_bd_backup'
]);