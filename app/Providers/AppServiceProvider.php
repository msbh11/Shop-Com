<?php

namespace App\Providers;
use View;
use Illuminate\Support\ServiceProvider;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //view::share('name' ,'xyz');

        /* View::composer(view , function)*/

        View::composer('front-end.includes.header',function ($view){
           $view -> with('categories', Category::where('publication_status',1)->get());
          
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
