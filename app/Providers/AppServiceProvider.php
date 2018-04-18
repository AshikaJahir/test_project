<?php

namespace TestProject\Providers;

use Illuminate\Support\ServiceProvider;
use TestProject\Repositories\Todo\TodoRepository;
use TestProject\Repositories\Todo\EloquentTodo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TodoRepository::class ,EloquentTodo::class);
    }
}
