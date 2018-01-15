<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        $repository = array('User');
        foreach($repository as $repo){
            $this->app->bind('App\Repositories\\'.$repo.'RepositoryInterface','App\Repositories\\'.$repo.'Repository');
        }
    }
}
