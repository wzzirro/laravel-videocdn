<?php

namespace wzzirro\videocdn;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;

/**
 *
 */
class VideoCdnServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $config = realpath(__DIR__ . '/../config/videocdn.php');

        $this->publishes([
            $config => config_path('videocdn.php'),
        ], 'config');

        $this->mergeConfigFrom($config, 'videocdn');
    }

    public function register()
    {
        $this->app->singleton('videocdn', function (Container $app) {
            $config = $app['config'];
            return new VideoCdn($config);
        });

    }

    public function provides()
    {
        return [
            'videocdn',
        ];
    }
}