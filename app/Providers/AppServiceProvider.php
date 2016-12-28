<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
	public function register() {
		if ($this->app->environment() == 'local') {
			$this->app->register('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider');
			$this->app->register('Way\Generators\GeneratorsServiceProvider');
			$this->app->register('Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider');
			$this->app->register('User11001\EloquentModelGenerator\EloquentModelGeneratorProvider');
		}
		$this->app->bind('db.connector.mssql', \Illuminate\Database\Connectors\SqlServerConnector::class);
		$this->app->bind('db.connection.mssql', \Miinto\Database\MsSqlConnection::class);
	}
}
