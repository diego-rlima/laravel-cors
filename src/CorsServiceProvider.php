<?php

namespace DRL\LaravelCors;

use Illuminate\Support\ServiceProvider;

class CorsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([$this->configPath() => config_path('cors.php')], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom($this->configPath(), 'cors');
    }

    /**
     * Path to configuration file.
     *
     * @return string
     */
    public function configPath(): string
    {
        return realpath(__DIR__ . '/../config/cors.php');
    }
}
