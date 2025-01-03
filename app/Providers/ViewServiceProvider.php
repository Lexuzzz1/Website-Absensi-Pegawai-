<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share the authenticated user with all views extending layouts.master
        View::composer('layouts.master', function ($view) {
            $view->with('user', Auth::user());
        });
    }
}
