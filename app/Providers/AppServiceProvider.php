<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Frontend;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	
        $front = Frontend::first();
		view()->share('front', $front);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
