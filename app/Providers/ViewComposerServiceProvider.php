<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // extract each view()->composer() to separate method if there are some!
        $this->composerNavigation();
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

    /**
     * Compose the navigation bar
     */
    public function composerNavigation()
    {
//        view()->composer('partials.nav', function ($view) {
//            $view->with('latest', Article::latest()->first());
//        });

        // this code has been imported to Http\Composers\NavigationComposer
//        view()->composer('partials.nav',
//            function ($view) {
//            $view->with('latest', Article::latest()->first());
//        });
        view()->composer('partials.nav', 'App\Http\Composers\NavigationComposer@compose');
    }
}
