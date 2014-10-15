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
	'uses' => 'Synthesise\Http\Controllers\AuthController@index'
]);

// Anmelden
Route::post('login', [
	'middleware' => 'csrf',
	'uses' => 'Synthesise\Http\Controllers\AuthController@login'
]);

// Passwort vergessen

// Impressum
Route::get('impressum', [
	'uses' => 'Synthesise\Http\Controllers\ImprintController@index'
]);

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function() {

	// DOWNLOAD ------------------------------------------------------
	Route::get('download/{type}/{file}', [
		'uses' => 'Synthesise\Http\Controllers\DownloadController@getFile'
	]);

	// LOGOUT --------------------------------------------------------
	Route::get('logout', [
		'as' => 'logout',
		'uses' => 'Synthesise\Http\Controllers\AuthController@logout'
	]);

	// DASHBOARD -----------------------------------------------------
	Route::get('/', [
		'as' => 'dashboard',
		'uses' => 'Synthesise\Http\Controllers\DashboardController@index'
	]);

	// ONLINE-LEKTIONEN ---------------------------------------------

	// Einzellektion
	Route::get('online-lektionen/{videoname}', [
		'as' => 'lektion',
		'uses' => 'Synthesise\Http\Controllers\LectionController@index'
	]);

	// GET PDF NOTES
	Route::get('online-lektionen/{videoname}/getnotespdf', [
		'uses' => 'Synthesise\Http\Controllers\LectionController@getNotesPDF'
	]);

	// GET PDF FLAGNAMES
	Route::get('online-lektionen/{videoname}/getflagnamespdf', [
		'uses' => 'Synthesise\Http\Controllers\LectionController@getFlagnamesPDF'
	]);

	// AJAX ####################################

	// Ajax GET FLAGS
	Route::get('online-lektionen/{videoname}/getflags', [
		'uses' => 'Synthesise\Http\Controllers\LectionController@getFlags'
	]);

	// Ajax GET NOTES
	Route::get('online-lektionen/{videoname}/getnotes', [
		'uses' => 'Synthesise\Http\Controllers\LectionController@getNotes'
	]);

	// Ajax POST NOTES
	Route::post('online-lektionen/{videoname}/postnotes', [
		'middleware' => 'csrf',
		'uses' => 'Synthesise\Http\Controllers\LectionController@postNotes'
	]);

	// HgF -----------------------------------------------------------
	Route::get('hgf/{letter?}', [
		'as' => 'hgf',
		'uses' => 'Synthesise\Http\Controllers\FaqController@index'
	]);

	// KONTAKT ------------------------------------------------------
	Route::get('kontakt', [
		'as' => 'kontakt',
		'uses' => 'Synthesise\Http\Controllers\ContactController@index'
	]);

	Route::post('kontakt/{send}', [
		'middleware' => 'csrf',
		'uses' => 'Synthesise\Http\Controllers\ContactController@send'
	]);

	// ANALYTICS ------------------------------------------------------
	Route::get('analytics', [
		'middleware' => 'admin',
		'uses' => 'Synthesise\Http\Controllers\AnalyticsController@index'
	]);

});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'api/v1','middleware' => 'auth.basic'], function() {

	// Messages ------------------------------------------------------

	Route::resource('messages', 'Synthesise\Http\Controllers\API\MessageController',['except' => ['create', 'show', 'edit']]);

});
