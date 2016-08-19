<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|-------------------------------------------------------------------------------
| Guest
|-------------------------------------------------------------------------------
*/

// Impressum
Route::get('impressum', 'ImprintController@index');

// Demoseite
Route::get('demo', 'DemoController@index');

// Audiocollage
Route::get('audiocollage', 'AudiocollageController@index');

/*
|-------------------------------------------------------------------------------
| Authentication
|-------------------------------------------------------------------------------
*/

// Laravel Authentication System
Route::auth();

/*
|-------------------------------------------------------------------------------
| Dashboard
|-------------------------------------------------------------------------------
*/

// Index
Route::get('/', [
  'as' => 'dashboard',
  'uses' => 'DashboardController@index',
]);

/*
|-------------------------------------------------------------------------------
| Online-Lections
|-------------------------------------------------------------------------------
*/

// Index
Route::get('online-lektionen/{videoname}/{sequenceNumber}', [
    'as' => 'lektion',
    'uses' => 'LectionController@index',
])
->where('sequenceNumber', '[0-9]+');

// Sequence Redurection
// @todo Überprüfen, ob es keine elegantere Lösung gibt.
Route::get('online-lektionen/{videoname}', [
    'uses' => 'LectionController@redirectSequence',
]);

// PDF notes
Route::get('online-lektionen/{videoname}/1/getnotespdf', [
    'uses' => 'LectionController@getNotesPDF',
])
->where('sequenceNumber', '[0-9]+');

// PDF flagnames
Route::get('online-lektionen/{videoname}/{sequenceNumber}/getflagnamespdf', [
    'uses' => 'LectionController@getFlagnamesPDF',
])
->where('sequenceNumber', '[0-9]+');

// AJAX: flagnames
Route::get('online-lektionen/{videoname}/{sequenceNumber}/getflags', [
    'uses' => 'LectionController@getFlags',
])
->where('sequenceNumber', '[0-9]+');

// AJAX: notes
Route::get('online-lektionen/{videoname}/{sequenceNumber}/getnotes', [
    'uses' => 'LectionController@getNotes',
])
->where('sequenceNumber', '[0-9]+');

// AJAX: notes
Route::post('online-lektionen/{videoname}/{sequenceNumber}/postnotes', [
    'uses' => 'LectionController@postNotes',
])
->where('sequenceNumber', '[0-9]+');

/*
|-------------------------------------------------------------------------------
| FAQ
|-------------------------------------------------------------------------------
*/

// Index
Route::get('faq/{letter?}', [
    'as' => 'faq',
    'uses' => 'FaqController@index',
])
->where('letter', '[A-Z]{1,1}');

// Store FAQ
Route::post('faq', [
    'uses' => 'FaqController@store',
]);

// Update FAQ
Route::match(['put', 'patch'], 'faq/{id}', [
    'uses' => 'FaqController@update',
]);

// Remove FAQ
Route::delete('faq/{id}', [
    'uses' => 'FaqController@destroy',
]);

/*
|-------------------------------------------------------------------------------
| Contact
|-------------------------------------------------------------------------------
*/

// Index
Route::get('kontakt', [
    'as' => 'kontakt',
    'uses' => 'ContactController@index',
]);

// Send feedback
Route::post('kontakt/feedback', [
    'uses' => 'ContactController@sendFeedback',
]);

// Send support
Route::post('kontakt/support', [
    'uses' => 'ContactController@sendSupport',
]);

/*
|-------------------------------------------------------------------------------
| Analytics
|-------------------------------------------------------------------------------
*/

// Index
Route::get('analytics', [
    'uses' => 'AnalyticsController@index',
]);

/*
|-------------------------------------------------------------------------------
| Download
|-------------------------------------------------------------------------------
*/

// Handle
Route::get('download/{type}/{file}', 'DownloadController@getFile');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
//
// Route::group(['prefix' => 'api/v1', 'middleware' => 'auth.basic'], function () {
//     // Messages
//     Route::resource('messages', 'API\MessageController', ['except' => ['create', 'show', 'edit']]);
// });
