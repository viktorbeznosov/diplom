<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Передали категории в шаблон 'public.layout'
        View::composer('public.layout', function ($view) {
            $categories = Category::get();
            $data = array(
                'categories' => $categories
            );
            $view->with($data);
        });
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
