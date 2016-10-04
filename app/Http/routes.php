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

    // Delete document
    Route::delete('/{name}', [
        'uses' => 'SeminarController@destroyDocument',
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

    // FAQs
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

    Route::get('/{name}/lection/{lection_name}/{sequence}', [
        'as' => 'lection',
        'uses' => 'LectionController@index',
    ])
    ->where('sequence', '[0-9]+');

});

/*
|-------------------------------------------------------------------------------
| Online-Lections
|-------------------------------------------------------------------------------
*/
//
// // Index
// Route::get('online-lektionen/{videoname}/{sequenceNumber}', [
//     'as' => 'lektion',
//     'uses' => 'LectionController@index',
// ])
// ->where('sequenceNumber', '[0-9]+');
//
// // Sequence Redurection
// // @todo Überprüfen, ob es keine elegantere Lösung gibt.
// Route::get('online-lektionen/{videoname}', [
//     'uses' => 'LectionController@redirectSequence',
// ]);
//
// // PDF notes
// Route::get('online-lektionen/{videoname}/1/getnotespdf', [
//     'uses' => 'LectionController@getNotesPDF',
// ])
// ->where('sequenceNumber', '[0-9]+');
//
// // PDF flagnames
// Route::get('online-lektionen/{videoname}/{sequenceNumber}/getflagnamespdf', [
//     'uses' => 'LectionController@getFlagnamesPDF',
// ])
// ->where('sequenceNumber', '[0-9]+');
//
// // AJAX: flagnames
// Route::get('online-lektionen/{videoname}/{sequenceNumber}/getflags', [
//     'uses' => 'LectionController@getFlags',
// ])
// ->where('sequenceNumber', '[0-9]+');
//
// // AJAX: notes
// Route::get('online-lektionen/{videoname}/{sequenceNumber}/getnotes', [
//     'uses' => 'LectionController@getNotes',
// ])
// ->where('sequenceNumber', '[0-9]+');
//
// // AJAX: notes
// Route::post('online-lektionen/{videoname}/{sequenceNumber}/postnotes', [
//     'uses' => 'LectionController@postNotes',
// ])
// ->where('sequenceNumber', '[0-9]+');


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
| Infoblock control
|-------------------------------------------------------------------------------
*/

// Store Infoblock.
Route::post('infoblock', [
    'uses' => 'InfoblockController@store',
]);

// Update Infoblock.
Route::match(['put', 'patch'], 'infoblock/{id}', [
    'uses' => 'InfoblockController@update',
]);

// Remove Infoblock.
Route::delete('infoblock/{id}', [
    'uses' => 'InfoblockController@destroy',
]);

/*
|-------------------------------------------------------------------------------
| Section control
|-------------------------------------------------------------------------------
*/

// Store Section.
Route::post('section', [
    'uses' => 'SectionController@store',
]);

// Update Section.
Route::match(['put', 'patch'], 'section/{name}', [
    'uses' => 'SectionController@update',
]);

// Remove Section.
Route::delete('section/{name}', [
    'uses' => 'SectionController@destroy',
]);

/*
|-------------------------------------------------------------------------------
| Lection control
|-------------------------------------------------------------------------------
*/

// Store Lection.
Route::post('lection', [
    'uses' => 'LectionController@store',
]);

// Attach Lection.
Route::post('lection/attach', [
    'uses' => 'LectionController@attach',
]);

// Detach Lection.
Route::delete('lection/detach/{name}/{section_id}', [
    'uses' => 'LectionController@detach',
]);

// Update Lection.
Route::match(['put', 'patch'], 'lection/{name}', [
    'uses' => 'LectionController@update',
]);

// Remove Lection.
Route::delete('lection/{name}', [
    'uses' => 'LectionController@destroy',
]);
