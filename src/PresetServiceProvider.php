<?php

namespace Laravel\Presets;

use Illuminate\Support\ServiceProvider;

class PresetServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('command.preset', function ($app) {
            return new PresetCommand();
        });

        $this->commands(['command.preset']);
    }
}
