<?php

namespace Deployer;

require 'recipe/laravel.php';

// Configuration
set('keep_releases', '3');

set('ssh_type', 'native');
set('ssh_multiplexing', true);

set('repository', 'git@github.com:inventionate/Synthesise.git');

add('shared_files', []);
add('shared_dirs', []);

add('writable_dirs', []);

// Servers
host('etpm.ph-karlsruhe.de')
    ->stage('production')
    ->user('etpm')
    ->identityFile('~/.ssh/id_rsa')
    ->set('deploy_path', '/home/etpm');

host('etpm-dev.ph-karlsruhe.de')
    ->stage('dev')
    ->user('etpm-dev')
    ->identityFile('~/.ssh/id_rsa')
    ->set('deploy_path', '/home/etpm-dev');

// Tasks

// desc('Restart PHP-FPM service');
task('symlink:public', function () {
    run('ln -sf {{deploy_path}}/current/public/.htaccess {{deploy_path}}/public');
    run('ln -sf {{deploy_path}}/current/public/* {{deploy_path}}/public');
    run('ln -sf {{deploy_path}}/shared/storage/app/public {{deploy_path}}/public/storage');
});
after('deploy:symlink', 'symlink:public');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
