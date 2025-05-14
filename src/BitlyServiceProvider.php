<?php

namespace Ahmedisa106\Shorturl;

use Illuminate\Support\ServiceProvider;

class BitlyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/bitly.php' => config_path('bitly.php'),
        ], 'bitlyconfig');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/bitly.php',
            'bitly'
        );
    }
}
