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
            ->name(name: 'laravel-cashapp')
            ->hasConfigFile(configFileName: 'cashapp')
            ->hasViews()
            ->hasMigration(migrationFileName: 'create_laravel-cashapp_table')
            ->hasCommand(commandClassName: CashAppCommand::class);
    }
}
