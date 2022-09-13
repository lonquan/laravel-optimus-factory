<?php

namespace AntCool\OptimusFactory;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use AntCool\OptimusFactory\Commands\LaravelOptimusFactoryCommand;

class OptimusFactoryServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-optimus-factory')
            ->hasConfigFile()
            ->hasCommand(LaravelOptimusFactoryCommand::class);
    }

    public function packageBooted()
    {
        $this->app->singleton(
            Factory::class,
            fn() => new Factory()
        );
    }
}
