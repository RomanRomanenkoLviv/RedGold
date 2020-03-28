<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('init:lang-files {lang}', function ($lang) {

    $src = base_path('vendor/caouecs/laravel-lang/src/' . $lang);
    $dest = resource_path('lang/' . $lang);

    $filesystem = new \Symfony\Component\Filesystem\Filesystem;
    $filesystem->mirror($src, $dest);

})->describe('Initialize lang files to resources/lang');


Artisan::command('prompt-install-nova', function (\Illuminate\Support\Composer $composer) {
    if (! $this->confirm('Install nova to project?')) {
        $this->output->writeln('Installing nova cancelled');
        return;
    }

    $composerJsonPath = base_path('composer.json');

    $repo = 'git@gitlab.ideil.com:nova/nova.git';

    $composerJson = json_decode(
        file_get_contents($composerJsonPath),
        true
    );

    $repositoryRegistered = false;

    foreach ($composerJson['repositories'] ?? [] as $repository) {
        if (in_array($repository['type'], ['vcs', 'git'])
            && $repository['url'] === $repo) {
                $repositoryRegistered = true;
        }

    }

    if (! $repositoryRegistered) {
        $composerJson['repositories'][] = ['type' => 'vcs', 'url' => $repo];

        file_put_contents(
            $composerJsonPath,
            json_encode($composerJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        $this->output->writeln('Registered <comment>nova repository</comment> to composer.json');
    }

    $this->output->writeln('Installing nova to project...');

    $process = (new \Symfony\Component\Process\Process(['composer', 'require', 'laravel/nova'], base_path()))
        ->setTimeout(null);

    $process->run();

    echo $process->getOutput();

    $this->output->writeln('Installing nova resources...');

    $process = (new \Symfony\Component\Process\Process(['php', 'artisan', 'nova:install'], base_path()))
        ->setTimeout(null);

    $process->run();

    echo $process->getOutput();

    $this->output->writeln('Changing nova path to /control');

    $configContent = file_get_contents(config_path('nova.php'));
    $configContent = preg_replace('~(\'path\'\s+\=\>\s+\')\/nova(\'\,)~', '$1/control$2', $configContent);
    file_put_contents(config_path('nova.php'), $configContent);

    $this->output->writeln('Done.');
})->describe('Prompt to install nova to project');