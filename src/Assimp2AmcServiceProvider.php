<?php

namespace SoipoServices\Assimp2Amc;

use SoipoServices\Assimp2Amc\Commands\Assimp2AmcCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class Assimp2AmcServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('assimp2amc')
            ->hasConfigFile()
            ->hasCommand(Assimp2AmcCommand::class)
           ;
    }



    public function packageRegistered()
    {
    
        $this->app->bind('assimp2amc', function ($app) {
            $bash = config('assimp2amc.bash_script');
            $path_to_executable = config('assimp2amc.path_to_executable');
            return new Assimp2Amc($bash,$path_to_executable);
        });
    }
}
