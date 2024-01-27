<?php

namespace NjoguAmos\CashApp;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use NjoguAmos\CashApp\Commands\CashAppCommand;

class CashAppServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-cash-app')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-cash-app_table')
            ->hasCommand(CashAppCommand::class);
    }
}
