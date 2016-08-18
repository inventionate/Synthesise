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

// Audiocollage
Route::get('audiocollage', 'AudiocollageController@index');

// Authentication System
Route::auth();

// DASHBOARD
Route::get('/', [
  'as' => 'dashboard',
  'uses' => 'DashboardController@index',
]);

    // DOWNLOAD
    Route::get('download/{type}/{file}', 'DownloadController@getFile');

    // LOGOUT
    // Route::get('logout', [
    //   'as' => 'logout',
    //   'uses' => 'Auth\AuthController@logout',
    // ]);

    // ONLINE-LEKTIONEN

    // Einzellektion
    Route::get('online-lektionen/{videoname}/{sequenceNumber}', [
      'as' => 'lektion',
      'uses' => 'LectionController@index',
    ])
    ->where('sequenceNumber', '[0-9]+');

    // Standardroute auf sequenzierte umleiten
    // @todo Überprüfen, ob es keine elegantere Lösung gibt.
    Route::get('online-lektionen/{videoname}', [
        'uses' => 'LectionController@redirectSequence',
    ]);

    // GET PDF NOTES
    Route::get('online-lektionen/{videoname}/1/getnotespdf', [
      'uses' => 'LectionController@getNotesPDF',
    ])
    ->where('sequenceNumber', '[0-9]+');

    // GET PDF FLAGNAMES
    Route::get('online-lektionen/{videoname}/{sequenceNumber}/getflagnamespdf', [
      'uses' => 'LectionController@getFlagnamesPDF',
    ])
    ->where('sequenceNumber', '[0-9]+');

    // AJAX

    // Ajax GET FLAGS
    Route::get('online-lektionen/{videoname}/{sequenceNumber}/getflags', [
        'uses' => 'LectionController@getFlags',
    ])
    ->where('sequenceNumber', '[0-9]+');

    // Ajax GET NOTES
    Route::get('online-lektionen/{videoname}/{sequenceNumber}/getnotes', [
        'uses' => 'LectionController@getNotes',
    ])
    ->where('sequenceNumber', '[0-9]+');

    // Ajax POST NOTES

    Route::post('online-lektionen/{videoname}/{sequenceNumber}/postnotes', [
    'uses' => 'LectionController@postNotes',
    ])
    ->where('sequenceNumber', '[0-9]+');

    /*
     * FAQ
     */
    Route::get('faq/{letter?}', [
      'as' => 'faq',
      'uses' => 'FaqController@index',
    ])
    ->where('letter', '[A-Z]{1,1}');

    Route::post('faq', [
      'uses' => 'FaqController@store',
    ]);

    Route::delete('faq/{id}', [
        'uses' => 'FaqController@destroy',
    ]);

    Route::match(['put', 'patch'], 'faq/{id}', [
        'uses' => 'FaqController@update',
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
      'uses' => 'AnalyticsController@index',
    ]);

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Das hier muss für die Lektionen gelöst werden!

Route::group(['prefix' => 'api/v1', 'middleware' => 'auth.basic'], function () {
    // Messages
    Route::resource('messages', 'API\MessageController', ['except' => ['create', 'show', 'edit']]);
});
