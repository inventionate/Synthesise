<?php
/*
 * Deploy Synthesise at University of Education Karlsruhe.
 */

require 'recipe/laravel.php';

// Set configurations
set('repository', 'git@github.com:inventionate/Synthesise.git');
set('shared_files', ['.env']);
set('shared_dirs', [
    'storage/app',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
]);
set('writable_dirs', ['bootstrap/cache', 'storage']);

// Configure servers
server('production', 'etpm.ph-karlsruhe.de')
    ->user('etpm')
    ->identityFile()
    ->env('deploy_path', '/home/etpm/test');

// server('beta', 'beta.domain.com')
//     ->user('username')
//     ->password()
//     ->env('deploy_path', '/var/www/beta.domain.com');

after('deploy:symlink', 'deploy:public_disk');
