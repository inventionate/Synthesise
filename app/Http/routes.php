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

/**
 * Login Route
 *
 */
// Anmeldeformular
Route::get('login', array(
	'as' => 'login',
	'before' => 'guest',
	'uses' => 'AuthController@index'
));

// Anmelden
Route::post('login', array(
	'before' => 'csrf',
	'uses' => 'AuthController@login'
));

// Passwort vergessen

/**
 * Impressum
 *
 */
Route::get('impressum', array(
	'uses' => 'ImprintController@index'

));

/**
 * Sicherheitsfilter
 *
 */
Route::group(array('before' => 'auth'), function()
{

	// DOWNLOAD ------------------------------------------------------
	Route::get('download/{type}/{file}', array(
		'uses' => 'DownloadController@getFile'
	));

	// HOME ----------------------------------------------------------
	Route::get('/', array(
		'as' => 'home',
		function()
		{
			return Redirect::route('dashboard');
		}
	));

	// LOGOUT --------------------------------------------------------
	Route::get('logout', array(
		'as' => 'logout',
		'uses' => 'AuthController@logout'
	));

	// DASHBOARD -----------------------------------------------------
	Route::get('dashboard', array(
		'as' => 'dashboard',
		'uses' => 'DashboardController@index'
	));

	// EVALUATION ----------------------------------------------------
	Route::get('evaluation', array(
		'as' => 'evaluation',
		'uses' => 'EvaluationController@index'
	));

	// ONLINE-LEKTIONEN ----------------------------------------------

	// Einzellektion
	Route::get('online-lektionen/{videoname}', array(
		'as' => 'lektion',
		'uses' => 'LectionController@index'
	));

	// GET PDF NOTES
	Route::get('online-lektionen/{videoname}/getnotespdf', array(
		'uses' => 'LectionController@getNotesPDF'
	));

	// GET PDF NOTES
	Route::get('online-lektionen/{videoname}/getflagnamespdf', array(
		'uses' => 'LectionController@getFlagnamesPDF'
	));

	// AJAX ####################################

	// Ajax GET FLAGS
	Route::get('online-lektionen/{videoname}/getflags', array(
		'uses' => 'LectionController@getFlags'
	));

	// Ajax GET NOTES
	Route::get('online-lektionen/{videoname}/getnotes', array(
		'uses' => 'LectionController@getNotes'
	));

	// Ajax POST NOTES
	Route::post('online-lektionen/{videoname}/postnotes', array(
		'before' => 'csrf',
		'uses' => 'LectionController@postNotes'
	));

	// HgF -----------------------------------------------------------
	Route::get('hgf/{letter?}', array(
		'as' => 'hgf',
		'uses' => 'FaqController@index'
	));

	// KONTAKT ------------------------------------------------------
	Route::get('kontakt', array(
		'as' => 'kontakt',
		'uses' => 'ContactController@index'
	));

	Route::post('kontakt/{send}', array(
		'before' => 'csrf',
		'uses' => 'ContactController@send'
	));

});
