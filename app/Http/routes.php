<?php

/*------------------------------------------------------------------------------
| Application Routes
|-------------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
|-------------------------------------------------------------------------------
| Guest Routes
|-------------------------------------------------------------------------------
*/

// Anmeldeformular

$router->get('login', [

	'as' => 'login',

	'middleware' => 'guest',

	'uses' => 'Synthesise\Http\Controllers\AuthController@index'

]);



// Anmelden

$router->post('login', [

	'middleware' => 'csrf',

	'uses' => 'Synthesise\Http\Controllers\AuthController@login'

]);



// Passwort vergessen



// Impressum

$router->get('impressum', [

	'uses' => 'Synthesise\Http\Controllers\ImprintController@index'

]);



/*
|-------------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

$router->group(['middleware' => 'auth'], function() {

// DOWNLOAD

$router->get('download/{type}/{file}', [

  'uses' => 'Synthesise\Http\Controllers\DownloadController@getFile'

]);


// LOGOUT

$router->get('logout', [

  'as' => 'logout',
  'uses' => 'Synthesise\Http\Controllers\AuthController@logout'

]);

// DASHBOARD

$router->get('/', [

  'as' => 'dashboard',
  'uses' => 'Synthesise\Http\Controllers\DashboardController@index'

]);

// ONLINE-LEKTIONEN

// Einzellektion

$router->get('online-lektionen/{videoname}', [

  'as' => 'lektion',
  'uses' => 'Synthesise\Http\Controllers\LectionController@index'

]);

// GET PDF NOTES

$router->get('online-lektionen/{videoname}/getnotespdf', [

  'uses' => 'Synthesise\Http\Controllers\LectionController@getNotesPDF'

]);

// GET PDF FLAGNAMES

$router->get('online-lektionen/{videoname}/getflagnamespdf', [

  'uses' => 'Synthesise\Http\Controllers\LectionController@getFlagnamesPDF'

]);

// AJAX
// Ajax GET FLAGS

$router->get('online-lektionen/{videoname}/getflags', [

	'uses' => 'Synthesise\Http\Controllers\LectionController@getFlags'

]);

// Ajax GET NOTES
$router->get('online-lektionen/{videoname}/getnotes', [

'uses' => 'Synthesise\Http\Controllers\LectionController@getNotes'

]);

// Ajax POST NOTES

$router->post('online-lektionen/{videoname}/postnotes', [

'middleware' => 'csrf',
'uses' => 'Synthesise\Http\Controllers\LectionController@postNotes'

]);

// HgF

$router->get('hgf/{letter?}', [

  'as' => 'hgf',
  'uses' => 'Synthesise\Http\Controllers\FaqController@index'

]);

// KONTAKT

$router->get('kontakt', [

  'as' => 'kontakt',
  'uses' => 'Synthesise\Http\Controllers\ContactController@index'

]);

$router->post('kontakt/{send}', [

  'middleware' => 'csrf',
  'uses' => 'Synthesise\Http\Controllers\ContactController@send'

]);

// ANALYTICS

$router->get('analytics', [

  'middleware' => 'admin',
  'uses' => 'Synthesise\Http\Controllers\AnalyticsController@index'

]);

});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

$router->group(['prefix' => 'api/v1','middleware' => 'auth.basic'], function() {

// Messages

$router->resource('messages', 'Synthesise\Http\Controllers\API\MessageController',['except' => ['create', 'show', 'edit']]);
});
