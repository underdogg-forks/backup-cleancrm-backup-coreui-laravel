<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Settings\Entities\Menu;

class ViewComposersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', function ($view) {
            $user = \Auth::check() ? \Auth::user() : null;

            $view->with('login_user', $user);
        });

        \View::composer('layouts.includes.sidebar', function ($view) {
            $menus = Menu::has('parent', 0)
                ->with(['childs' => function($q) {
                    $q->orderBy('order');
                }])->orderBy('order')->get();

            $view->with('menus', $menus);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
