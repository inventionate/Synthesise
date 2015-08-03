<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Authentication Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the authentication driver that will be utilized.
    | This driver manages the retrieval and authentication of the users
    | attempting to get access to protected areas of your application.
    |
    | Supported: "database", "eloquent"
    |
    */

    'driver' => 'eloquent',

    /*
    |--------------------------------------------------------------------------
    | Authentication Model
    |--------------------------------------------------------------------------
    |
    | When using the "Eloquent" authentication driver, we need to know which
    | Eloquent model should be used to retrieve your users. Of course, it
    | is often just the "User" model but you may use whatever you like.
    |
    */

    'model' => Synthesise\User::class,

    /*
    |--------------------------------------------------------------------------
    | Authentication Table
    |--------------------------------------------------------------------------
    |
    | When using the "Database" authentication driver, we need to know which
    | table should be used to retrieve your users. We have chosen a basic
    | default value but you may easily change it to any table you like.
    |
    */

    'table' => 'users',

    /*
    |--------------------------------------------------------------------------
    | Password Reminder Settings
    |--------------------------------------------------------------------------
    |
    | Here you may set the settings for password reminders, including a view
    | that should be used as your password reminder e-mail. You will also
    | be able to set the name of the table that holds the reset tokens.
    |
    | The "expire" time is the number of minutes that the reminder should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'reminder' => [
        'email' => 'emails.password',
        'table' => 'password_resets',
        'expire' => 60,
    ],

    /*
    |--------------------------------------------------------------------------
    | LDAP Authentication Settings
    |--------------------------------------------------------------------------
    |
    | Here you may set the settings for LDAP server connection. You may get
    | both information form your university or company.
    |
    */

    'ldap' => [
        'domain' => '193.197.136.102',
        'baseDn' => 'dc=ka,dc=ph-bw,dc=net',
    ],

    /*
    |--------------------------------------------------------------------------
    | Analytics Settings
    |--------------------------------------------------------------------------
    |
    | Here you may set the settings for Piwik Analytics API. You can find the
    | auth token and base URL on the API documentation site of your Piwik Site.
    |
    */

    'analytics' => [
        'baseUrl' => 'https://etpm-analytics.ph-karlsruhe.de/',
        'tokenAuth' => '22050cb4e8db16196138632a000ed946',
    ],

];
