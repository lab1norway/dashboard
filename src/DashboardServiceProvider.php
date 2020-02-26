<?php

namespace BuildUp\Dashboard;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(realpath(__DIR__.'/../resources/lang'), 'dashboard');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard');
        // $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->app['router']->namespace('BuildUp\\Dashboard\\Controllers')
                ->middleware(['web'])
                ->group(function () {
                    $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
                });

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/dashboard.php', 'dashboard');

        // Register the service the package provides.
        $this->app->singleton('dashboard', function ($app) {
            return new Dashboard;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['dashboard'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
       /*  $this->publishes([
            __DIR__.'/../config/dashboard.php' => config_path('dashboard.php'),
        ], 'dashboard.config'); */

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/dashboard'),
        ], 'dashboard-views');

        // Publishing assetsga.
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/dashboard'),
        ], 'dashboard-public');

        // Publishing the translation files.
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/dashboard'),
        ], 'dashboard-lang');

        // Registering package commands.
        // $this->commands([]);
    }
}
