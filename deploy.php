<?php
namespace Deployer;

require 'recipe/common.php';

// Configuration
set('ssh_type', 'native');
set('ssh_multiplexing', false);
set('repository', '0');
set('git_tty', true);
set('default_stage', 'prod');
set('keep_releases', 3);

// Hosts
/*host('52.9.126.26')
    ->stage('qa')
    ->set('deploy_path', '/var/www/html/qa')
    ->port(22)
    ->user('ubuntu')
    ->set('branch', 'qa')
    ->identityFile('/home/kiran/CueBackQA.pem', 'kiran');
*/
host('52.9.126.26')
    ->stage('prod')
    ->set('deploy_path', '/var/www/html/cueback')
    ->port(22)
    ->user('ubuntu')
    ->set('branch', 'master')
    ->identityFile('/home/kiran/CueBackQA.pem', 'kiran');

set('repository', 'git@github.com:CueBack/IB_code.git');

task('deploy:build_assets', function () {
    $sites = array(
    '0' => 'calpoly.cueback.com',
    '1' => 'demo.cueback.com',
    '2' => 'maritime.cueback.com',
    '3' => 'infobeans.cueback.com',
    '4' => 'memories.cueback.com',
    );
    foreach ($sites as $key => $value) {
        run('mkdir {{release_path}}/sites/'.$value.'/default');
        run('ln -nfs --relative {{deploy_path}}/shared/sites/'.$value.'/default/files/  {{release_path}}/sites/'.$value.'/default/');
        run('ln -nfs --relative {{deploy_path}}/shared/sites/'.$value.'/settings.php  {{release_path}}/sites/'.$value.'/');
    }
})->desc('Upload build assets');

desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:build_assets',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
