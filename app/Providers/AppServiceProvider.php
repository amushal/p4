<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);

        //Cache all tags for menu
        view()->composer('layouts.app', function($view) {
            //$tags = \App\Tag::has('contacts')->pluck('name');
            //$user = \App\User::with('contacts.tags')->find(1); // todo: \App\Auth::user();
            if (\Auth::check()) {
                $user_id = \Auth::user()->id;
                $user = \App\User::with('contacts.tags')->find($user_id);
                $tags = $user->getTags();
                //dd($user->getTags());
                $view->with(compact('tags'));
            }
        });

        //Add this custom validation rule.
        Validator::extend('alpha_spaces', function ($attribute, $value) {
            // This will only accept alpha and spaces.
            // If you want to accept hyphens use: /^[\pL\s-]+$/u.
            return preg_match('/^[\pL\s]+$/u', $value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        //$this->app->register(\Propaganistas\LaravelPhone\PhoneServiceProvider::class);

    }
}
