<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

// Anmeldeformular
Route::get('login', [
	'as' => 'login',
	'middleware' => 'guest',
	'uses' => 'AuthController@index'
]);

// Anmelden
Route::post('login', [
	'middleware' => 'csrf',
	'uses' => 'AuthController@login'
]);

// Passwort vergessen

// Impressum
Route::get('impressum', [
	'uses' => 'ImprintController@index'
]);

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function() {

	// DOWNLOAD ------------------------------------------------------
	Route::get('download/{type}/{file}', [
		'uses' => 'DownloadController@getFile'
	]);

	// LOGOUT --------------------------------------------------------
	Route::get('logout', [
		'as' => 'logout',
		'uses' => 'AuthController@logout'
	]);

	// DASHBOARD -----------------------------------------------------
	Route::get('dashboard', [
		'as' => 'dashboard',
		'uses' => 'DashboardController@index'
	]);

	// ONLINE-LEKTIONEN ---------------------------------------------

	// Einzellektion
	Route::get('online-lektionen/{videoname}', [
		'as' => 'lektion',
		'uses' => 'LectionController@index'
	]);

	// GET PDF NOTES
	Route::get('online-lektionen/{videoname}/getnotespdf', [
		'uses' => 'LectionController@getNotesPDF'
	]);

	// GET PDF FLAGNAMES
	Route::get('online-lektionen/{videoname}/getflagnamespdf', [
		'uses' => 'LectionController@getFlagnamesPDF'
	]);

	// AJAX ####################################

	// Ajax GET FLAGS
	Route::get('online-lektionen/{videoname}/getflags', [
		'uses' => 'LectionController@getFlags'
	]);

	// Ajax GET NOTES
	Route::get('online-lektionen/{videoname}/getnotes', [
		'uses' => 'LectionController@getNotes'
	]);

	// Ajax POST NOTES
	Route::post('online-lektionen/{videoname}/postnotes', [
		'middleware' => 'csrf',
		'uses' => 'LectionController@postNotes'
	]);

	// HgF -----------------------------------------------------------
	Route::get('hgf/{letter?}', [
		'as' => 'hgf',
		'uses' => 'FaqController@index'
	]);

	// KONTAKT ------------------------------------------------------
	Route::get('kontakt', [
		'as' => 'kontakt',
		'uses' => 'ContactController@index'
	]);

	Route::post('kontakt/{send}', [
		'middleware' => 'csrf',
		'uses' => 'ContactController@send'
	]);

	// ANALYTICS ------------------------------------------------------
	Route::get('analytics', [
		'middleware' => 'admin',
		'uses' => 'AnalyticsController@index'
	]);

});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'api/v1','middleware' => 'auth.basic'], function() {

	// Messages ------------------------------------------------------

	Route::resource('messages', 'API\MessageController',['except' => ['create', 'show', 'edit']]);

});
