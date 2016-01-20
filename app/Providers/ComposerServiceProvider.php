<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ComposerServiceProvider
 * @package App\Providers
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Boot the view composer
     */
    public function boot() {
        //class based composer
        view()->composer(
          'front.partials.header-menu', 'App\Http\ViewComposers\CartComposer'
        );
    }

    /**
     * Register the Service Provider
     */
    public function register()
    {

    }
}