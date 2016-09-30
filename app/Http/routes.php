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
    Route::get('/{name}', [
        'as' => 'seminar',
        'uses' => 'SeminarController@index',
    ]);

    // Store
    Route::post('/', [
        'uses' => 'SeminarController@store',
    ]);

    // Edit
    Route::match(['put', 'patch'], '/{name}', [
        'uses' => 'SeminarController@update',
    ]);

    // Delete
    Route::delete('/{name}', [
        'uses' => 'SeminarController@destroy',
    ]);

    // Seminar Users
    Route::get('/{name}/users', [
        'as' => 'seminar-users',
        'uses' => 'SeminarController@users',
    ]);

    // Seminar Settings
    Route::get('/{name}/settings', [
        'as' => 'seminar-settings',
        'uses' => 'SeminarController@settings',
    ]);

    // FAQ Index
    Route::get('/{name}/faq/{letter?}', [
        'as' => 'seminar-faqs',
        'uses' => 'SeminarController@faqs',
    ])
    ->where('letter', '[A-Z]{1,1}');

    // Contact
    Route::get('/{name}/contact', [
        'as' => 'seminar-contact',
        'uses' => 'SeminarController@contact',
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
| FAQ control
|-------------------------------------------------------------------------------
*/

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
| Contact control
|-------------------------------------------------------------------------------
*/

// Send feedback
Route::post('contact/feedback', [
    'as' => 'feedback',
    'uses' => 'ContactController@sendFeedback',
]);

// Send support
Route::post('contact/support', [
    'as' => 'support',
    'uses' => 'ContactController@sendSupport',
]);

/*
|-------------------------------------------------------------------------------
| Info control
|-------------------------------------------------------------------------------
*/

// Send feedback
Route::match(['put', 'patch'], 'info/{id}', [
    'uses' => 'InfoController@update',
]);
