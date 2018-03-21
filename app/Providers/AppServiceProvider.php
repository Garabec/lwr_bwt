<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Contracts\Events\Dispatcher;
use  Illuminate\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use JeroenNoten\LaravelAdminLte\AdminLte;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Contracts\Auth\Guard;
use App\Service\Menu;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
             URL::forceScheme('https');
             
              
            
       
            
            
        
    
             
             
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->singleton('App\Service\Menu', function ($app) {
          return new Menu();
});
        //
    }
}
