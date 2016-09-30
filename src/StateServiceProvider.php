<?php


namespace Moritzewert\Status;


use Illuminate\Support\ServiceProvider;
use Moritzewert\Status\Dispatcher as DispatcherContract;

class StateServiceProvider extends ServiceProvider
{
    public $migrationsPath = '/../migrations/';
    /**
     * Boot the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.$this->migrationsPath);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(StateManager::class, function ($app) {
            return new StateManager($app);
        });
    }
}