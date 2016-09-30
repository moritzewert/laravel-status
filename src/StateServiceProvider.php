<?php


namespace Moritzewert\Status;


use Illuminate\Support\ServiceProvider;
use Moritzewert\Status\Dispatcher as DispatcherContract;

class StateServiceProvider extends ServiceProvider
{
    /**
     * Boot the application services.
     *
     * @return void
     */
    public function boot()
    {
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