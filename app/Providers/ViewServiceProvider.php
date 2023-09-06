<?php

namespace App\Providers;

use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Settings;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\whyChoseUs;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */



    public function boot()
    {
        View::composer('*', function ($view) {

            $services = Service::Active()->get();
            $why_chose_us = whyChoseUs::Active()->get();
            $testimonials = Testimonial::Active()->get();
            $portfolio_home = Portfolio::home()->get();
            $setting = Settings::find(1);
            $view->with(['testimonials' => $testimonials, 'services' => $services, 'portfolio_home' => $portfolio_home, 'setting' => $setting, 'why_chose_us' => $why_chose_us]);
        });
    }
}
