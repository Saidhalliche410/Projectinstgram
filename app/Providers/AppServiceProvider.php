<?php

namespace App\Providers;

use App\Mail\Mailuser;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use function Termwind\paragraph;

/**
 * @method static created()
 */
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
//        User::created(function ($user){
//            Mail::to($user)->send(new Mailuser());
//        });

    }
}
