<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Tweet;
use App\Observers\UserObserver;
use App\Observers\TweetObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
