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
server('production', 'etpm.ph-karlsruhe.de')
    ->user('etpm')
    ->identityFile()
    ->set('deploy_path', '/home/etpm/test')
    ->pty(true);

server('dev', 'etpm-dev.ph-karlsruhe.de')
    ->user('etpm-dev')
    ->identityFile()
    ->set('deploy_path', '/home/etpm-dev')
    ->pty(true);

// Tasks

// desc('Restart PHP-FPM service');
task('symlink:public', function () {
    run('ln -s {{deploy_path}}/current/public/.htaccess /home/etpm-dev/public');
    run('ln -s {{deploy_path}}/current/public/* /home/etpm-dev/public');
});
after('deploy:symlink', 'symlink:public');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
