<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Tweet;
use App\Observers\UserObserver;
use App\Observers\TweetObserver;
use Illuminate\Support\ServiceProvider;
use App\Providers\TelescopeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Tweet::observe(TweetObserver::class);
    }
}
