<?php

namespace NjoguAmos\CashApp\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use NjoguAmos\CashApp\CashAppServiceProvider;
use Saloon\MockConfig;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        MockConfig::setFixturePath('fixtures');

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Njogu Amos\\CashApp\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            CashAppServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-cashapp_table.php.stub';
        $migration->up();
        */
    }
}
