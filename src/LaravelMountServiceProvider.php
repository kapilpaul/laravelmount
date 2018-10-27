<?php

namespace KapilPaul\LaravelMount;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use KapilPaul\LaravelMount\Http\Middleware\CanInstall;

class LaravelMountServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        // Loading routes
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/routes.php';
        }
        $this->loadViewsFrom(__DIR__ . '/views', 'laravelmount');

        $this->publishes(
            [
                __DIR__ . '/assets' => public_path('laravelmount'),
            ], 'laravelmount'
        );

        $router->middlewareGroup('install', [CanInstall::class]);
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

    }

}
