<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view)
        {

            view()->composer('*', function($view)
            {
                if (Auth::check()) {
                    $my_id = Auth::id();
                    $users = Message::where('is_read', 0)->where('user_id', $my_id)->count();
                    $view->with('users', $users );
                }else {
                    $view->with('users', 0);
                }
            });
            view()->composer('*', function($view)
            {
                if (Auth::check()) {
                    $my_id = Auth::id();
                     $message = Message::where('is_read', 0)->where(['user_id' => $my_id])->get();
                    $view->with('message', $message );
                }
            });


        });
    }
}
