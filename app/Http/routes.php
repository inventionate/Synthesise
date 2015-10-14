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
| Guest Routes
|-------------------------------------------------------------------------------
*/

// Impressum

Route::get('impressum', 'ImprintController@index');

// Promoseite

Route::get('demo', 'DemoController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
]);

/*
|-------------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'auth'], function () {
    // DOWNLOAD
    Route::get('download/{type}/{file}', 'DownloadController@getFile');

    // LOGOUT
    Route::get('logout', [
      'as' => 'logout',
      'uses' => 'Auth\AuthController@logout',
    ]);

    // DASHBOARD
    Route::get('/', [
      'as' => 'dashboard',
      'uses' => 'DashboardController@index',
    ]);

    // ONLINE-LEKTIONEN

    // Einzellektion
    Route::get('online-lektionen/{videoname}/{sequenceNumber}', [
      'as' => 'lektion',
      'uses' => 'LectionController@index',
    ])
    ->where('sequenceNumber', '[0-9]+');

    // GET PDF NOTES
    Route::get('online-lektionen/{videoname}/1/getnotespdf', [
      'uses' => 'LectionController@getNotesPDF',
    ])
    ->where('sequenceNumber', '[0-9]+');

    // GET PDF FLAGNAMES
    Route::get('online-lektionen/{videoname}/{sequenceNumber?}/getflagnamespdf', [
      'uses' => 'LectionController@getFlagnamesPDF',
    ])
    ->where('sequenceNumber', '[0-9]+');

    // AJAX

    // Ajax GET FLAGS
    Route::get('online-lektionen/{videoname}/{sequenceNumber?}/getflags', [
        'uses' => 'LectionController@getFlags',
    ])
    ->where('sequenceNumber', '[0-9]+');

    // Ajax GET NOTES
    Route::get('online-lektionen/{videoname}/{sequenceNumber?}/getnotes', [
        'uses' => 'LectionController@getNotes',
    ])
    ->where('sequenceNumber', '[0-9]+');

    // Ajax POST NOTES

    Route::post('online-lektionen/{videoname}/{sequenceNumber?}/postnotes', [
    'uses' => 'LectionController@postNotes',
    ])
    ->where('sequenceNumber', '[0-9]+');

    // HgF
    Route::get('hgf/{letter?}', [
      'as' => 'hgf',
      'uses' => 'FaqController@index',
    ]);

    // KONTAKT
    Route::get('kontakt', [
      'as' => 'kontakt',
      'uses' => 'ContactController@index',
    ]);

    Route::post('kontakt/feedback', [
      'uses' => 'ContactController@sendFeedback',
    ]);

    Route::post('kontakt/support', [
        'uses' => 'ContactController@sendSupport',
    ]);

    // ANALYTICS
    Route::get('analytics', [
      'middleware' => 'admin',
      'uses' => 'AnalyticsController@index',
    ]);

});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api/v1', 'middleware' => 'auth.basic'], function () {
    // Messages
    Route::resource('messages', 'API\MessageController', ['except' => ['create', 'show', 'edit']]);
});
