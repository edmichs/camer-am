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
    'middleware' => 'auth',

]);
//get list off souscripteur
Route::get('souscripteur/list',[
	'as'=>'souscripteur_list_path',
	'uses'=>'SouscripteurController@index',
    'middleware' => 'auth',
]);
//print
Route::get('souscripteur/list/download_pdf',[
    'as'=>'souscripteur_list_download_pdf',
    'uses'=>'SouscripteurController@download_pdf',
    'middleware' => 'auth',
]);
//
Route::get('souscripteur/list/stream_pdf',[
    'as'=>'souscripteur_list_stream_pdf',
    'uses'=>'SouscripteurController@stream_pdf',
    'middleware' => 'auth',
]);
//valide form add
Route::post('souscripteur/add',[
	'as'=>'add_souscripteur_path',
	'uses'=>'SouscripteurController@store',
    'middleware' => 'auth',
]);
//show details
Route::get('souscripteur/show/{id}',[
    'as'=>'souscripteur_show_path/{id}',
    'uses'=>'SouscripteurController@show',
    'middleware' => 'auth',
]);
//update view
Route::get('souscripteur/update/{id}',[
    'as'=>'souscripteur_update_path/{id}',
    'uses'=>'SouscripteurController@edit',
    'middleware' => 'auth',
]);
Route::post('souscripteur/update',[
    'as'=>'souscripteur_update_path',
    'uses'=>'SouscripteurController@update',
    'middleware' => 'auth',
]);
Route::get('souscripteur/delete/{id}',[
    'as'=>'souscripteur_delete_path/{id}',
    'uses'=>'SouscripteurController@destroy',
    'middleware' => 'auth',
]);
Route::get('souscripteur/new/{id}',[
    'as'=>'souscripteur_new_path/{id}',
    'uses'=>'SouscripteurController@addNew',
    'middleware' => 'auth',
]);
Route::get('souscripteur/print/all',[
    'as'=>'souscripteur_print_all',
    'uses'=>'SouscripteurController@printAll',
    'middleware' => 'auth',
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
    'middleware' => 'auth',
]);
Route::post('surccusale/add',[
   'as' => 'add_surccusale_path',
   'uses' => 'SurccusaleController@store',
    'middleware' => 'auth',
]);
Route::get('surccusale/list',[
   'as' => 'list_surccusale_path',
   'uses' => 'SurccusaleController@index',
    'middleware' => 'auth',
]);
Route::get('surccusale/show/{id}',[
    'as' => 'show_surccusale_path/{id}',
    'uses' => 'SurccusaleController@show',
    'middleware' => 'auth',
]);
Route::post('surccusale/add/{id}',[
    'as' => 'add_surccusale_path/{id}',
    'uses' => 'SurccusaleController@getFormAdd',
    'middleware' => 'auth',
]);
Route::get('surccusale/delete/{id}',[
    'as' => 'delete_surccusale_path/{id}',
    'uses' => 'SurccusaleController@destroy',
    'middleware' => 'auth',
]);
Route::get('surccusale/update/{id}',[
    'as' => 'update_surccusale_path/{id}',
    'uses' => 'SurccusaleController@edit',
    'middleware' => 'auth',
]);
Route::post('surccusale/update/',[
    'as' => 'update_surccusale_path',
    'uses' => 'SurccusaleController@update',
    'middleware' => 'auth',
]);

Route::get('surccusale/print/all',[
    'as' => 'succursale_print_all',
    'uses' => 'SurccusaleController@printAll',
    'middleware' => 'auth'
]);
/*
 * Compagnie route
 * */

Route::get('compagny/add',[
	'as'=>'compagnie_add_path',
	'uses'=>'CompagnyController@create',
    'middleware' => 'auth',
]);
Route::get('compagny/list',[
	'as'=>'compagnie_list_path',
	'uses'=>'CompagnyController@index',
    'middleware' => 'auth',
]);
Route::get('compagny/show/{id}',[
	'as'=>'compagnie_show_path/{id}',
	'uses'=>'CompagnyController@show',
    'middleware' => 'auth',
]);
Route::get('compagny/update/{id}',[
	'as'=>'compagnie_show_path/{id}',
	'uses'=>'CompagnyController@edit',
    'middleware' => 'auth',
]);
Route::get('compagny/delete/{id}',[
	'as'=>'compagnie_delete_path/{id}',
	'uses'=>'CompagnyController@destroy',
    'middleware' => 'auth',
]);
Route::post('compagny/update/',[
	'as'=>'compagnie_update_path',
	'uses'=>'CompagnyController@update',
    'middleware' => 'auth',
]);
Route::post('compagny/add',[
	'as'=>'compagnie_add_path',
	'uses'=>'CompagnyController@store',
    'middleware' => 'auth',
]);
Route::get('compagny/print/all',[
    'as'=>'compagnie_print_path',
    'uses'=>'CompagnyController@printAll',
    'middleware' => 'auth',
]);
/*
 * categorie assure route
 * */

Route::get('categorie-assure/add',[
	'as'=>'add_categorie_assure_path',
	'uses'=>'CategorieAssureController@create',
    'middleware' => 'auth',
]);
Route::get('categorie-assure/list',[
	'as'=>'compagnie_assure_list_path',
	'uses'=>'CategorieAssureController@index',
    'middleware' => 'auth',
]);
Route::get('categorie-assure/show/{id}',[
	'as'=>'compagnie_show_path/{id}',
	'uses'=>'CategorieAssureController@show',
    'middleware' => 'auth',
]);
Route::get('categorie-assure/update/{id}',[
	'as'=>'compagnie_edit_path/{id}',
	'uses'=>'CategorieAssureController@edit',
    'middleware' => 'auth',
]);
Route::get('categorie-assure/delete/{id}',[
	'as'=>'compagnie_delete_path/{id}',
	'uses'=>'CategorieAssureController@destroy',
    'middleware' => 'auth',
]);
Route::post('categorie-assure/update/',[
	'as'=>'compagnie_update_path',
	'uses'=>'CategorieAssureController@update',
    'middleware' => 'auth',
]);
Route::post('categorie-assure/add',[
	'as'=>'add_categorie_assure_path',
	'uses'=>'CategorieAssureController@store',
    'middleware' => 'auth',
]);

/*
 * Exercice route
 * */

//add route
Route::get('exercice/add',[
	'as' => 'add_exercice_path',
	'uses' => 'ExerciceController@create',
    'middleware' => 'auth',
]);
Route::post('exercice/add',[
	'as' => 'add_exercice_path',
	'uses' => 'ExerciceController@store',
    'middleware' => 'auth',
]);

Route::get('exercice/list',[
	'as'=>'list_exercice_path',
	'uses'=>'ExerciceController@index',
    'middleware' => 'auth',
]);
Route::post('exercice/lock',[
	'as'=>'cloture_excercice_path',
	'uses'=>'ExerciceController@cloture',
    'middleware' => 'auth',
]);
Route::get('exercice/show/{id}',[
	'as'=>'show_excercice_path/{id}',
	'uses'=>'ExerciceController@show',
    'middleware' => 'auth',
]);
Route::get('exercice/succursale/{id}',[
	'as'=>'succursale_excercice_path/{id}',
	'uses'=>'ExerciceController@getSuccursale',
    'middleware' => 'auth',
]);
Route::get('exercice/assure/{id}',[
	'as'=>'assure_excercice_path/{id}',
	'uses'=>'ExerciceController@getAssure',
    'middleware' => 'auth',
]);
Route::get('exercice/incorporate/{id}',[
	'as'=>'incorporate_excercice_path/{id}',
	'uses'=>'ExerciceController@getIncorporate',
    'middleware' => 'auth',
]);
Route::get('exercice/bpc/{id}',[
	'as'=>'bpc_excercice_path/{id}',
	'uses'=>'ExerciceController@getBpc',
    'middleware' => 'auth',
]);
Route::get('exercice/decompte/{id}',[
	'as'=>'decompte_excercice_path/{id}',
	'uses'=>'ExerciceController@getDecompte',
    'middleware' => 'auth',
]);
Route::get('exercice/remboursement/{id}',[
	'as'=>'remboursement_excercice_path/{id}',
	'uses'=>'ExerciceController@getRemboursement',
    'middleware' => 'auth',
]);

/*
 * Assur� & incorporation route
 */
Route::get('assure/list',[
    'as' => 'list_assure_path',
    'uses' =>'AssureController@index',
    'middleware' => 'auth',
]);
Route::get('assure/add',[
    'as' => 'add_assure_path',
    'uses' =>'AssureController@create',
    'middleware' => 'auth',
]);
Route::get('assure/show/{id}',[
    'as' => 'show_assure_path/{id}',
    'uses' =>'AssureController@show',
    'middleware' => 'auth',
]);
Route::get('assure/{id}/print',[
    'as' => 'assure.print',
    'uses' =>'AssureController@printer',
    'middleware' => 'auth',
]);
Route::get('assure/update/{id}',[
    'as' => 'update_assure_path/{id}',
    'uses' =>'AssureController@edit',
    'middleware' => 'auth',
]);
Route::get('assure/delete/{id}',[
    'as' => 'delete_assure_path/{id}',
    'uses' =>'AssureController@destroy',
    'middleware' => 'auth',
]);
Route::post('assure/add',[
    'as' => 'add_assure_path',
    'uses' =>'AssureController@store',
    'middleware' => 'auth',
]);
Route::post('assure/update',[
    'as' => 'update_assure_path',
    'uses' =>'AssureController@update',
    'middleware' => 'auth',
]);
Route::get('assure/print/all',[
    'as' => 'print_assure_path',
    'uses' =>'AssureController@printAll',
    'middleware' => 'auth',
]);
Route::get('assure/print/',[
    'as' => 'print_assure_path_exercice',
    'uses' =>'AssureController@printByExercice',
    'middleware' => 'auth',
]);

//incorporation routes
Route::get('assure/incorporation',[
    'as' => 'incorporation_assure_path',
    'uses' =>'IncorporationController@index',
    'middleware' => 'auth',
]);

Route::get('incorporate/show/{id}',[
    'as' => 'show_incorporate_path/{id}',
    'uses' =>'IncorporationController@show',
    'middleware' => 'auth',
]);
Route::get('incorporate/edit/{id}',[
    'as' => 'edit_incorporate_path/{id}',
    'uses' =>'IncorporationController@edit',
    'middleware' => 'auth',
]);
Route::post('incorporate/update',[
    'as' => 'update_incorporate_path',
    'uses' =>'IncorporationController@update',
    'middleware' => 'auth',
]);
Route::post('incorporate/uptodate',[
    'as' => 'uptodate_incorporate_path',
    'middleware' => 'auth',
    'uses' =>'IncorporationController@upToDate'
]);

Route::get('incorporate/delete/{id}',[
    'as' => 'delete_incorporate_path/{id}',
    'middleware' => 'auth',
    'uses' =>'IncorporationController@destroy'
]);
Route::post('incorporation/add',[
    'as' => 'add_incorpore_path',
    'middleware' => 'auth',
    'uses' =>'IncorporationController@store'
]);


/*
 * Police Routes
 */
Route::get('police/add',[
    'as' => 'add_police_path',
    'middleware' => 'auth',
    'uses' => 'PoliceController@create'
]);
Route::post('police/add',[
    'as' => 'add_police_path',
    'middleware' => 'auth',
    'uses' => 'PoliceController@store'
]);
Route::get('police/list',[
    'as' => 'list_police_path',
    'middleware' => 'auth',
    'uses' => 'PoliceController@index'
]);
Route::get('police/update/{id}',[
    'as' => 'update_police_path/{id}',
    'middleware' => 'auth',
    'uses' => 'PoliceController@edit'
]);
Route::get('police/delete/{id}',[
    'as' => 'delete_police_path/{id}',
    'middleware' => 'auth',
    'uses' => 'PoliceController@delete'
]);
Route::get('police/show/{id}',[
    'as' => 'show_police_path/{id}',
    'middleware' => 'auth',
    'uses' => 'PoliceController@show'
]);
Route::post('police/update/',[
    'as' => 'update_police_path',
    'middleware' => 'auth',
    'uses' => 'PoliceController@update'
]);
Route::get('police/print',[
    'as' => 'print_police_path',
    'middleware' => 'auth',
    'uses' => 'PoliceController@printAll'
]);
/*
 * Prestataire Route
 */
Route::get('centre-sante/list',[
    'as' => 'list_prestataire_path',
    'middleware' => 'auth',
    'uses' => 'CentreSanteController@index'
]);
Route::get('centre-sante/add',[
    'as' => 'add_prestataire_path',
    'middleware' => 'auth',
    'uses' => 'CentreSanteController@create'
]);
Route::get('centre-sante/edit/{id}',[
    'as' => 'edit_prestataire_path',
    'middleware' => 'auth',
    'uses' => 'CentreSanteController@edit'
]);
Route::get('centre-sante/delete/{id}',[
    'as' => 'delete_prestataire_path',
    'middleware' => 'auth',
    'uses' => 'CentreSanteController@destroy'
]);
Route::get('centre-sante/show/{id}',[
    'as' => 'show_prestataire_path/{id}',
    'middleware' => 'auth',
    'uses' => 'CentreSanteController@show'
]);
Route::post('centre-sante/update',[
    'as' => 'update_prestataire_path',
    'middleware' => 'auth',
    'uses' => 'CentreSanteController@update'
]);
Route::post('centre-sante/add',[
    'as' => 'add_prestataire_path',
    'middleware' => 'auth',
    'uses' => 'CentreSanteController@store'
]);
/*
 * Bpc Routes
 */
Route::get('bpc/add',[
    'as' => 'add_bpc_path',
    'middleware' => 'auth',
    'uses' => 'BpcController@create'
]);

Route::post('bpc/add',[
   'as'=>'add_bpc_path',
   'uses'=>'BpcController@store',
    'middleware' => 'auth',
]);
Route::get('bpc/list',[
   'as'=>'list_bpc_path',
    'middleware' => 'auth',
   'uses'=>'BpcController@index'
]);
Route::get('bpc/show/{id}',[
   'as' => 'show_bpc_path/{id}',
    'middleware' => 'auth',
   'uses' => 'BpcController@show'
]);
Route::get('bpc/{id}/print',[
    'as' => 'bpc.print',
    'middleware' => 'auth',
    'uses' => 'BpcController@printer'
]);
Route::get('bpc/print',[
    'as' => 'bpc_print_path',
    'middleware' => 'auth',
    'uses' => 'BpcController@printerPdf'
]);
Route::get('bpc/update/{id}',[
   'as' => 'update_bpc_path/{id}',
    'middleware' => 'auth',
   'uses' => 'BpcController@edit'
]);
Route::get('bpc/delete/{id}',[
   'as' => 'delete_bpc_path/{id}',
    'middleware' => 'auth',
   'uses' => 'BpcController@destroy'
]);

Route::get('bpc/print',[
    'as' => 'print_bpc_path',
    'middleware' => 'auth',
    'uses' => 'BpcController@printe'
]);

Route::post('bpc-print/',[
    'as' => 'print-bpc-path',
    'middleware' => 'auth',
    'uses' => 'BpcController@printBpc'
]);

/*
 * Decompte Route
 */
Route::get('decompte/add',[
   'as'=>'add_decompte_path',
    'middleware' => 'auth',
   'uses'=>'DecompteController@create'
]);
Route::post('decompte/add',[
   'as'=>'add_decompte_path',
    'middleware' => 'auth',
   'uses'=>'DecompteController@store'
]);
Route::get('decompte/{id}/print',[
    'as'=>'decompte.print',
    'middleware' => 'auth',
    'uses'=>'DecompteController@printer'
]);
Route::post('decompte/second/add',[
   'as'=>'add_bpc_second_path',
    'middleware' => 'auth',
   'uses'=>'DecompteController@storeIn'
]);
Route::get('decompte/list',[
   'as'=>'list_decompte_path',
    'middleware' => 'auth',
   'uses'=>'DecompteController@index'
]);
Route::post('decompte/delete/presta',[
   'as'=>'delete_presta_path',
    'middleware' => 'auth',
   'uses'=>'DecompteController@delete'
]);
Route::post('decompte/delete/presta',[
    'as'=>'delete_presta_path',
    'middleware' => 'auth',
    'uses'=>'DecompteController@delete'
]);
Route::get('decompte/show/{id}',[
    'as' => 'show_decompte_path/{id}',
    'middleware' => 'auth',
    'uses' => 'DecompteController@show'
]);

/*
 * Remboursement Route
 */
Route::get('remboursement/validation',[
    'as'=>'add_remboursement_path',
    'middleware' => 'auth',
    'uses'=>'RemboursementController@create'
]);
Route::get('remboursement/print',[
    'as'=>'remboursement.print',
    'middleware' => 'auth',
    'uses'=>'RemboursementController@printer'
]);
Route::get('remboursement/list',[
    'as'=>'list_remboursement_path',
    'middleware' => 'auth',
    'uses'=>'RemboursementController@index'
]);
Route::post('remboursement/add',[
    'as'=>'store_remboursement_path',
    'middleware' => 'auth',
    'uses'=>'RemboursementController@store'
]);
/*
 * Remboursement Route
 */
Route::get('bonus/validation',[
    'as'=>'add_bonus_path',
    'middleware' => 'auth',
    'uses'=>'BonusMalusController@create'
]);
Route::get('bonus/list',[
    'as'=>'list_bonus_path',
    'middleware' => 'auth',
    'uses'=>'BonusMalusController@index'
]);
Route::post('bonus/add',[
    'as'=>'store_bonus_path',
    'middleware' => 'auth',
    'uses'=>'BonusMalusController@store'
]);

/*
 * Tarif routes
 */
Route::get('tarif/prestation/add',[
   'as' => 'add_prestation_path',
    'middleware' => 'auth',
   'uses' => 'TarifController@addPrestation'
]);
Route::get('tarif/bareme/add',[
   'as' => 'add_bareme_path',
    'middleware' => 'auth',
   'uses' => 'TarifController@addbareme'
]);
Route::get('tarif/categorie/add',[
   'as' => 'add_cate_presta_path',
    'middleware' => 'auth',
   'uses' => 'TarifController@addCategorie'
]);
Route::get('tarif/categorie/all',[
   'as' => 'all_categorie_path',
    'middleware' => 'auth',
   'uses' => 'TarifController@getCategorie'
]);
Route::get('tarif/prestation/all',[
   'as' => 'all_prestation_path',
    'middleware' => 'auth',
   'uses' => 'TarifController@getPrestation'
]);
Route::get('tarif/bareme/all',[
   'as' => 'all_bareme_path',
    'middleware' => 'auth',
   'uses' => 'TarifController@getBareme'
]);
Route::get('tarif/bareme/edit/{id}',[
   'as' => 'edit_bareme_path/{id}',
    'middleware' => 'auth',
   'uses' => 'TarifController@editBareme'
]);
Route::get('tarif/prestation/edit/{id}',[
   'as' => 'edit_prestation_path/{id}',
    'middleware' => 'auth',
   'uses' => 'TarifController@editPrestation'
]);
Route::get('tarif/categorie/edit/{id}',[
   'as' => 'edit_categorie_path/{id}',
    'middleware' => 'auth',
   'uses' => 'TarifController@editCategorie'
]);
Route::post('tarif/prestation/add',[
   'as' => 'add_prestation_path',
    'middleware' => 'auth',
   'uses' => 'TarifController@storePrestation'
]);
Route::post('tarif/bareme/add',[
    'as' => 'add_bareme_path',
    'middleware' => 'auth',
   'uses' => 'TarifController@storeBareme'
]);
Route::post('tarif/categorie/add',[
    'as' => 'add_cate_presta_path',
    'middleware' => 'auth',
   'uses' => 'TarifController@storeCategorie'
]);
Route::post('tarif/categorie/update',[
    'as' => 'tarif_categorie_update_path',
    'middleware' => 'auth',
   'uses' => 'TarifController@updateCategorie'
]);
Route::post('tarif/prestation/update',[
    'as' => 'tarif_prestation_update_path',
    'middleware' => 'auth',
   'uses' => 'TarifController@updatePrestation'
]);
Route::post('tarif/bareme/update',[
    'as' => 'tarif_bareme_update_path',
    'middleware' => 'auth',
   'uses' => 'TarifController@updateBareme'
]);
Route::get('tarif/categorie/delete/{id}',[
    'as' => 'delete_categorie_path/{id}',
    'middleware' => 'auth',
    'uses' => 'TarifController@deleteCategorie'
]);
Route::get('tarif/prestation/delete/{id}',[
    'as' => 'delete_prestation_path/{id}',
    'middleware' => 'auth',
    'uses' => 'TarifController@deletePrestation'
]);
Route::get('tarif/bareme/delete/{id}',[
    'as' => 'delete_bareme_path/{id}',
    'middleware' => 'auth',
    'uses' => 'TarifController@deleteBareme'
]);

//end remboursement route
/*
 * Statistique Road
 * */
Route::get('statistiques/assure',[
    'as' => 'stat_assure_path',
    'uses' => 'StatistiqueController@getAssure',
    'middleware' => 'auth'
]);

/**
 * route for Proposition  automobile
 */
Route::get('proposition/categorie/automobile/add',[
    'as' => 'auto_add_path',
    'uses' => 'AutomobileController@create',
    'middleware' => 'auth'
]);
Route::get('proposition/categorie/automobile/',[
    'as' => 'auto_list_path',
    'uses' => 'AutomobileController@index',
    'middleware' => 'auth'
]);

Route::post('proposition/categorie/automobile/add',[
    'as' => 'auto_add_path',
    'uses' => 'AutomobileController@store',
    'middleware' => 'auth'
]);

Route::get('proposiion/categorie/automobile/print',[
   'as' => 'auto_print_path',
    'uses' => 'AutomobileController@printer',
    'middleware' => 'auth'
]);

Route::post('proposiion/categorie/automobile/cancel',[
    'as' => 'auto_cancel_path',
     'uses' => 'AutomobileController@destroy',
     'middleware' => 'auth'
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
Route::get('/', [
    'as' => 'accueil_path',
    'middleware' => 'auth',
    'uses' => 'HomeController@index'
]);

Route::get('/backup/db', [
    'as' => 'sauvegarde.bd',
    'middleware' => 'auth',
    'uses' => 'BackupController@save_bd'
]);
Route::post('/backup/db', [
    'as' => 'sauvegarde.bd.create',
    'middleware' => 'auth',
    'uses' => 'BackupController@create_bd_backup'
]);

/**
 * 
 * Maladie road
 * 
 */
// get all route
Route::get('/categories/maladie/all', [
    'as' => 'maladie_path',
    'middleware' => 'auth',
    'uses' => 'MaladieController@index'
]);
Route::get('/categories/maladie/add', [
    'as' => 'maladie_add_path',
    'middleware' => 'auth',
    'uses' => 'MaladieController@create'
]);
Route::get('/categories/maladie/print', [
    'as' => 'maladie_print_path',
    'middleware' => 'auth',
    'uses' => 'MaladieController@index'
]);



/**
 * 
 * Retraite Road
 */

Route::get('/categories/retraite/all', [
    'as' => 'retraite_path',
    'middleware' => 'auth',
    'uses' => 'RetraiteController@index'
]);
Route::get('/categories/retraite/add', [
    'as' => 'retraite_add_path',
    'middleware' => 'auth',
    'uses' => 'RetraiteController@create'
]);
Route::get('/categories/retraite/print', [
    'as' => 'retraite_print_path',
    'middleware' => 'auth',
    'uses' => 'RetraiteController@index'
]);
//end retraire road

/**
 * 
 * Prevoyance-retraite road
 */


Route::get('/categories/prevoyance-retraite/all', [
    'as' => 'prevoyance_retraite_path',
    'middleware' => 'auth',
    'uses' => 'PrevoyanceRetraiteController@index'
]);
Route::get('/categories/prevoyance-retraite/add', [
    'as' => 'prevoyance_retraite_add_path',
    'middleware' => 'auth',
    'uses' => 'PrevoyanceRetraiteController@create'
]);
Route::get('/categories/prevoyance-retraite/print', [
    'as' => 'prevoyance_retraite_print_path',
    'middleware' => 'auth',
    'uses' => 'PrevoyanceRetraiteController@index'
]);

//end prevoyance-retraite road

/**
 * Prevoyance Sante
 */


Route::get('/categories/prevoyance-sante/all', [
    'as' => 'prevoyance_sante_path',
    'middleware' => 'auth',
    'uses' => 'PrevoyanceSanteController@index'
]);
Route::get('/categories/prevoyance-sante/add', [
    'as' => 'prevoyance_sante_add_path',
    'middleware' => 'auth',
    'uses' => 'PrevoyanceSanteController@create'
]);
Route::get('/categories/prevoyance-sante/print', [
    'as' => 'prevoyance_sante_print_path',
    'middleware' => 'auth',
    'uses' => 'PrevoyanceSanteController@index'
]);

Route::post('/backup/db', [
    'as' => 'sauvegarde.bd.create',
    'middleware' => 'auth',
    'uses' => 'BackupController@create_bd_backup'
]);



