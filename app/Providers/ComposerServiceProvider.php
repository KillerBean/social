<?php

namespace App\Providers;

use View;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::creator(['pages.profile', 'pages.settings'], 'App\Http\ViewComposers\ProfileComposer');
        //View::composer('pages.profile', 'App\Http\ViewComposers\ProfileComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
