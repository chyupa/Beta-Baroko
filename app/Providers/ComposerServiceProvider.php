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
    public function boot()
    {
        //class based composer
        view()->composer(
          [
            'front.partials.header-menu',
            'front.partials.left-cart',
          ],
          'App\Http\ViewComposers\CartComposer'
        );
        view()->composer(
          'front.partials.left-menu', 'App\Http\ViewComposers\CategoryComposer'
        );
    }

    /**
     * Register the Service Provider
     */
    public function register()
    {

    }
}