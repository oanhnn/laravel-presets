<?php

namespace Laravel\Presets;

use Illuminate\Support\ServiceProvider;

class PresetServiceProvider extends ServiceProvider
{
    /**
     * Register services
     */
    public function register()
    {
        $this->app->singleton('command.preset', function ($app) {
            return new PresetCommand();
        });

        $this->commands(['command.preset']);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return ['command.preset'];
    }
}
