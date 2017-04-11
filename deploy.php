<?php

namespace Deployer;

require 'recipe/laravel.php';

// Configuration

set('ssh_type', 'native');
set('ssh_multiplexing', true);

set('repository', 'git@github.com:inventionate/Synthesise.git');

add('shared_files', []);
add('shared_dirs', []);

add('writable_dirs', []);
// set('shared_files', ['.env']);
// set('shared_dirs', [
//     'storage/app',
//     'storage/framework/cache',
//     'storage/framework/sessions',
//     'storage/framework/views',
//     'storage/logs',
// ]);
// set('writable_dirs', ['bootstrap/cache', 'storage']);

// Servers

server('production', 'etpm.ph-karlsruhe.de')
    ->user('etpm')
    ->identityFile()
    ->set('deploy_path', '/home/etpm/test')
    ->pty(true);

// Tasks

// desc('Restart PHP-FPM service');
// task('php-fpm:restart', function () {
//     // The user must have rights for restart service
//     // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
//     run('sudo systemctl restart php-fpm.service');
// });
// after('deploy:symlink', 'php-fpm:restart');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
// Checken, ob das nötig ist!!!
// before('deploy:symlink', 'artisan:migrate');
