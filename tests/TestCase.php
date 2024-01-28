<?php

namespace NjoguAmos\CashApp\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use NjoguAmos\CashApp\CashAppServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

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
        config()->set('cashapp.client_id', 'ACKIl7VOyOUwAgCzTYF1+B+A9sfq0kIGTy+Z43wENpw=');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-cashapp_table.php.stub';
        $migration->up();
        */
    }
}
