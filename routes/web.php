<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
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
| Seminars
|-------------------------------------------------------------------------------
*/

Route::group(['prefix' => 'seminars'], function () {

    // Homepage
    Route::get('/{name}', [
        'as' => 'seminar',
        'uses' => 'SeminarController@show',
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
    Route::delete('/{name}/infodocument', [
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

    // Lection
    Route::get('/{name}/lections/{lection_name}/{sequence}', [
        'as' => 'lection',
        'uses' => 'SeminarController@lection',
    ])
    ->where('sequence', '[0-9]+');

    // Post note (AJAX)
    Route::post('/{name}/lections/{lection_name}/{sequence}/note', [
        'uses' => 'NoteController@store',
    ])
    ->where('sequence', '[0-9]+');

    // Get note (AJAX).
    Route::get('/{name}/lections/{lection_name}/{sequence}/note', [
        'uses' => 'NoteController@get',
    ])
    ->where('sequence', '[0-9]+');

    // Update note (AJAX).
    Route::match(['put', 'patch'], '/{name}/lections/{lection_name}/{sequence}/note', [
        'uses' => 'NoteController@update',
    ])
    ->where('sequence', '[0-9]+');

    // Destroy note (AJAX)
    Route::delete('/{name}/lections/{lection_name}/{sequence}/note', [
        'uses' => 'NoteController@destroy',
    ])
    ->where('sequence', '[0-9]+');

    // PDF notes
    Route::get('/{name}/lections/{lection_name}/{sequence}/pdfnotes', [
        'as' => 'pdfnotes',
        'uses' => 'LectionController@getNotesPDF',
    ])
    ->where('sequence', '[0-9]+');

});

/*
|-------------------------------------------------------------------------------
| Download
|-------------------------------------------------------------------------------
*/

// Handle
Route::get('download', 'DownloadController@getFile');

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
