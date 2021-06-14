<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        view()->composer('layouts.app', function ($view) {
            $user_id = Auth::user()->id ?? '';
            $view->user_id = $user_id;
        });
    }

    public function register()
    {
        //
    }
}