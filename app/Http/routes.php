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


// @TODO abstrahieren!!!
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
| Seminars
|-------------------------------------------------------------------------------
*/

Route::group(['prefix' => 'seminar'], function () {

    // Homepage
    Route::get('{name}/', [
        'as' => 'seminar',
        'uses' => 'SeminarController@index',
    ]);

});

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
|-------------------------------------------------------------------------------
| Messsage System
|-------------------------------------------------------------------------------
*/

// Store Message
Route::post('message', [
    'uses' => 'MessageController@store',
]);

// Update Message
Route::match(['put', 'patch'], 'message/{id}', [
    'uses' => 'MessageController@update',
]);

// Remove Message
Route::delete('message/{id}', [
    'uses' => 'MessageController@destroy',
]);


/*
|-------------------------------------------------------------------------------
| User control
|-------------------------------------------------------------------------------
*/

// Index
Route::get('user/{letter?}', [
    'as' => 'users',
    'uses' => 'UserController@index',
])
->where('letter', '[A-Z]{1,1}');

// Store User
Route::post('user', [
    'uses' => 'UserController@store',
]);

// Update User
Route::match(['put', 'patch'], 'user/{id}', [
    'uses' => 'UserController@update',
]);

// Remove User
Route::delete('user/{id}', [
    'uses' => 'UserController@destroy',
])
->where('id', '[0-9]+');

// Remove Many Users
Route::delete('deletemanyusers', [
    'uses' => 'UserController@destroyMany',
]);

// Remove All Users
Route::delete('deleteallusers', [
    'uses' => 'UserController@destroyAll',
]);

/*
|-------------------------------------------------------------------------------
| Seminar control
|-------------------------------------------------------------------------------
*/

// Index
Route::get('seminar/settings/{id}', [
    'as' => 'seminar-settings',
    'uses' => 'SeminarController@settings'
])
->where('id', '[0-9]+');

// Remove All Users
Route::delete('seminar/{id}', [
    'uses' => 'SeminarController@destroy',
])
->where('id', '[0-9]+');
