<?php

namespace Marcusmyers\Report;

use Illuminate\Support\ServiceProvider;

class ReportServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            // $this->publishes([
            //     __DIR__.'/../config/config.php' => config_path('report.php'),
            // ], 'config');

            if (! class_exists('CreateAnnouncementsTable')) {
                $this->publishes([
                    __DIR__.'/../database/migrations/create_announcements_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_announcements_table.php'),
                ], 'migrations');
            }

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'report');

        // Register the main class to use with the facade
        $this->app->bind('report', function () {
            return new Report;
        });
    }
}
